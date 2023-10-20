<?php

namespace Database\Seeders;

use App\Models\BoardingSchool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardingSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BoardingSchool::create([
            'name' => 'Ponpes Intan Ilmu',
            'npsn' => '01234'
        ]);
    }
}
