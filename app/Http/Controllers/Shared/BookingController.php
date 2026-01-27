<?php

namespace App\Http\Controllers\Shared;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            // Ambil user_id pengguna yang sedang login
            $userId = Auth::id();

            // Ambil data bookings berdasarkan user_id yang sedang login
            // Sertakan data payments menggunakan relasi
            $bookings = Booking::with('payment', 'galleries')
                ->where('user_id', $userId)
                ->get();

            // Jika bookings ditemukan, kembalikan data dalam format JSON
            if ($bookings->isNotEmpty()) {
                return response()->json(['bookings' => $bookings], 200);
            }

            // Jika tidak ada bookings ditemukan
            return response()->json(['message' => 'No bookings found for this user'], 404);
        }

        // Jika pengguna tidak terautentikasi
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function createBooking(Request $request)
    {
        Log::info('Create Booking Called', ['request_data' => $request->all()]);

        // Validasi input
        $validated = $request->validate([
            'province_id' => 'required|integer',
            'province_name' => 'required|string|max:255',
            'regency_id' => 'required|integer',
            'regency_name' => 'required|string|max:255',
            'district_id' => 'required|integer',
            'district_name' => 'required|string|max:255',
            'village_id' => 'required|integer',
            'village_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'usage_date' => 'required|date',
            'price' => 'required|numeric',
            'user_id' => 'required|numeric',
            'car_id' => 'required|numeric',
            'car_name' => 'required|string|max:255',
        ]);

        // Simpan data booking
        $booking = Booking::create($validated);

        // Konfigurasi Midtrans dari file services.php
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = config('services.midtrans.env') === 'production';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat order dengan order_id yang unik
        $uniqueOrderId = 'order_' . uniqid(); // Menghasilkan order_id yang unik
        $order = [
            'transaction_details' => [
                'order_id' => $uniqueOrderId, // ID unik untuk order_id
                'gross_amount' => $validated['price'], // Total harga
            ],
            'customer_details' => [
                'first_name' => $validated['name'],
                'email' => 'customer@example.com', // Ganti dengan email yang sesuai
                'phone' => $validated['phone'],
                'billing_address' => [
                    'address' => $validated['address'],
                    'city' => $validated['district_name'],
                ],
            ],
        ];

        try {
            // Dapatkan snap token
            $snapToken = Snap::getSnapToken($order); // Pastikan $order sudah didefinisikan
            Log::info('Snap Token Response', ['response' => $snapToken]);

            // Simpan snap_token dan payment_status ke tabel payments
            Payment::create([
                'booking_id' => $booking->id,
                'snap_token' => $snapToken,
                'payment_status' => 'pending',
                'order_id' => $uniqueOrderId, // Simpan order_id yang unik
            ]);

            // Kembalikan snap token sebagai redirect_url
            return response()->json(['snap_token' => $snapToken], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons yang sesuai
            Log::error('Payment Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function midtransCallback(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.env') === 'production';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        try {
            $notification = new Notification();

            $status = $notification->transaction_status;
            $type = $notification->payment_type;
            $fraud = $notification->fraud_status;
            $order_id = $notification->order_id;

            // Cari payment berdasarkan order_id yang dikirim oleh Midtrans
            $payment = Payment::where('order_id', $order_id)->first();

            if (!$payment) {
                Log::error('Payment not found', ['order_id' => $order_id]);
                return response()->json(['error' => 'Payment not found'], 404);
            }

            // Update status payment sesuai dengan status transaksi dari Midtrans
            if ($status == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $payment->payment_status = 'PENDING';
                    } else {
                        $payment->payment_status = 'SUCCESS';
                    }
                }
            } elseif ($status == 'settlement') {
                $payment->payment_status = 'SUCCESS';
            } elseif ($status == 'pending') {
                $payment->payment_status = 'PENDING';
            } elseif (in_array($status, ['deny', 'expire', 'cancel'])) {
                $payment->payment_status = 'CANCELLED';
            }

            // Simpan perubahan status pembayaran
            $payment->save();

            // Ambil data booking terkait
            $booking = $payment->booking;

            if ($payment->payment_status == 'SUCCESS') {
                // Jika pembayaran sukses, ubah status booking menjadi 'confirmed'
                $booking->status = 'confirmed';
            } elseif ($payment->payment_status == 'CANCELLED') {
                // Jika pembayaran dibatalkan, ubah status booking menjadi 'cancelled'
                $booking->status = 'cancelled';
            }

            // Simpan perubahan status booking
            $booking->save();

            Log::info('Payment and Booking status updated', ['order_id' => $order_id, 'payment_status' => $payment->payment_status]);

            return response()->json(['meta' => ['code' => 200, 'message' => 'Midtrans Notification Success']]);
        } catch (\Exception $e) {
            Log::error('Midtrans Callback Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
