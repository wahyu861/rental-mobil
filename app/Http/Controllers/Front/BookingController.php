<?php

namespace App\Http\Controllers\Front;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Review;

class BookingController extends Controller
{
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

        // Konfigurasi Midtrans dari file service.php
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = config('services.midtrans.env') === 'production';
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat order dengan order_id yang unik
        $uniqueOrderId = 'order_' . uniqid(); // Menghasil order_id yang unik
        $order = [
            'transaction_details' => [
                'order_id' => $uniqueOrderId, // ID unik untuk order_id
                'gross_amount' => $validated['price'] // Total harga
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
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kembalikan respons yang sesuai
            Log::error('Payment Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storeReview(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'username' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
            'review_date' => 'required|date'
        ]);

        // Simpan review ke dalam database
        Review::create($validatedData);
        return redirect()->back()->with('success', 'Review Submitted Successfully!');
    }
}
