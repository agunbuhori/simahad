<?php

namespace Database\Seeders;

use App\Enum\ClassLevel;
use App\Models\BoardingSchool;
use App\Models\ClassRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ([7, 8, 9] as $arr) {
            foreach (['A', 'B', 'C', 'D'] as $name) {
                ClassRoom::create([
                    'level' => $arr,
                    'name' => $name,
                    'boarding_school_id' => BoardingSchool::first()->id
                ]);
            }
        }
    }
}
