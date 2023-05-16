<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Man U22 Football',
                'description' => 'Pit chea jg merl klang nas',
                'numberOfSeats' => 25000,
                'date' => '2023-05-16',
                'stadium_id' => 1,
                'sport_id' => 15
            ],
            [
                'name' => 'Women U22 Football',
                'description' => 'Pit chea jg merl klang nas',
                'numberOfSeats' => 25000,
                'date' => '2023-05-16',
                'stadium_id' => 1,
                'sport_id' => 15
            ],
            [
                'name' => 'Women U22 Basketball',
                'description' => 'Pit chea jg merl klang nas',
                'numberOfSeats' => 25000,
                'date' => '2023-05-16',
                'stadium_id' => 2,
                'sport_id' => 4
            ],
        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
