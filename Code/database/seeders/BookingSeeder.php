<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
            [
                'price'=>'Free',
                'Zone' => 'A',
                'event_id'=> 1
            ],
            [
                'price'=>'Free',
                'Zone' => 'B',
                'event_id'=> 1
            ],
        ];
        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
