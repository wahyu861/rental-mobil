<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $bookings = Booking::where('is_read', false)->orderBy('created_at', 'desc')->get(['car_name', 'id', 'created_at']);

        return response()->json($bookings);
    }

    public function clearAllNotifications()
    {
        try {
            Booking::where('is_read', false)->update(['is_read' => true]);
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
