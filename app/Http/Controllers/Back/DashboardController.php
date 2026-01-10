<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy Data
        $currentWeekBookings = 15; // Total pemesanan minggu ini
        $previousWeekBookings = 10; // Total pemesanan minggu sebelumnya

        // Hitung persentase kenaikan
        $increasePercentage = $previousWeekBookings > 0
            ? (($currentWeekBookings - $previousWeekBookings) / $previousWeekBookings) * 100
            : 0;

        $totalUsersWithRoleUser = 120; // Total user dengan role 'user'
        $totalBlogs = 25; // Total jumlah blog

        // Data dummy kategori
        $categoryLabels = ['SUV', 'Sedan', 'Truck'];
        $categoryCounts = [5, 7, 3]; // Jumlah mobil per kategori

        // Data dummy pemesanan bulanan
        $monthLabels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $monthlyOrderCounts = [3, 5, 7, 2, 0, 1, 4, 8, 6, 5, 10, 2]; // Jumlah pemesanan per bulan

        // Data dummy untuk pemesanan terbaru
        $recentBookings = [
            [
                'user' => ['name' => 'John Doe'],
                'car_name' => 'Toyota Corolla',
                'payment' => ['status' => 'success'],
            ],
            [
                'user' => ['name' => 'Jane Smith'],
                'car_name' => 'Honda Civic',
                'payment' => ['status' => 'pending'],
            ],
            [
                'user' => ['name' => 'Alice Brown'],
                'car_name' => 'Ford Ranger',
                'payment' => ['status' => 'success'],
            ],
            [
                'user' => ['name' => 'Bob White'],
                'car_name' => 'Chevrolet Tahoe',
                'payment' => ['status' => 'canceled'],
            ],
        ];


        // Data dummy untuk mobil terbaru
        $recentCars = [
            ['name' => 'Toyota Corolla', 'created_at' => \Carbon\Carbon::now()->subDays(5), 'galleries' => ['gallery1.jpg', 'gallery2.jpg']],
            ['name' => 'Honda Civic', 'created_at' => \Carbon\Carbon::now()->subDays(3), 'galleries' => ['gallery3.jpg', 'gallery4.jpg']],
            ['name' => 'Ford Ranger', 'created_at' => \Carbon\Carbon::now()->subDay(), 'galleries' => ['gallery5.jpg', 'gallery6.jpg']],
            ['name' => 'Chevrolet Tahoe', 'created_at' => \Carbon\Carbon::now()->subDays(10), 'galleries' => ['gallery7.jpg', 'gallery8.jpg']],
        ];


        // Data dummy FAQ
        $faqs = [
            ['question' => 'How do I book a car?', 'answer' => 'You can book a car through our website.'],
            ['question' => 'What is the cancellation policy?', 'answer' => 'You can cancel up to 24 hours before your booking.'],
        ];

        // Kirim data ke view
        return view('back.dashboard.index', compact(
            'currentWeekBookings',
            'increasePercentage',
            'totalUsersWithRoleUser',
            'totalBlogs',
            'categoryLabels',
            'categoryCounts',
            'recentBookings',
            'recentCars',
            'faqs',
            'monthlyOrderCounts',
            'monthLabels'
        ));
    }
}
