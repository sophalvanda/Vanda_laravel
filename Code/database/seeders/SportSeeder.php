<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sports = [
            ['name' => 'basketball'],
            ['name' => 'cycling'],
            ['name' => 'E-sport'],
            ['name' => 'football'],
            ['name' => 'taekwondo'],
            ['name' => 'volleyball'],
        ];
        foreach ($sports as $sport) {
            Sport::create($sport);
        };
    }
    
}
