<?php

namespace Database\Seeders;

use App\Models\Matching;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matchings = [
            [
                'team1' => 'Cambodia',
                'team2' => 'Indonesia',
                'time' => '16:00',
                'event_id' => 1,
            ],
            [
                'team1' => 'Philippines',
                'team2' => 'Myanmar',
                'time' => '17:00',
                'event_id' => 1,
            ],
        ];
        foreach ($matchings as $matching) {
            Matching::create($matching);
        }
    }
}
