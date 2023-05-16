<?php

namespace Database\Seeders;

use App\Models\Stadium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stadiums = [
            [
                'name' => 'National Stadium',
                'ZoneA' => 5000,
                'ZoneB' => 20000,
            ],
            [
                'name' => 'Smart Stadium',
                'ZoneA' => 1000,
                'ZoneB' => 10000,
            ],
        ];
        foreach ($stadiums as $stadium) {
            Stadium::create($stadium);
        }
    }
}
