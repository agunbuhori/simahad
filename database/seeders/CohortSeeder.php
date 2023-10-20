<?php

namespace Database\Seeders;

use App\Models\BoardingSchool;
use App\Models\Cohort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cohort::create([
            'year_start' => 2023,
            'year_end' => 2024,
            'boarding_school_id' => BoardingSchool::first()->id
        ]);
    }
}
