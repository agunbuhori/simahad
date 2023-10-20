<?php

namespace Database\Seeders;

use App\Models\BoardingSchool;
use App\Models\DormRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DormRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([1, 2, 3, 4, 5, 6] as $g) {
            foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $k) {
                DormRoom::create([
                    'boarding_school_id' => BoardingSchool::first()->id,
                    'name' => "Gedung $g - Kamar $k",
                    'gender' => $g <= 3 ? 'F' : 'M'
                ]);
            }
        }
    }
}
