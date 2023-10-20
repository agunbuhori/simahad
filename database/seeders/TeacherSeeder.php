<?php

namespace Database\Seeders;

use App\Enum\UserRole;
use App\Models\BoardingSchool;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@simahad.com',
            'password' => bcrypt('rahasia'),
            'boarding_school_id' => BoardingSchool::first()->id
        ]);

        $user->assign(UserRole::ADMINISTRATOR);

        $user->teacher()->create([
            'boarding_school_id' => $user->boarding_school_id,
            'name' => "Admin Boarding School",
            'birthdate' => "1998-03-31"
        ]);

        Teacher::factory(10)->create();
    }
}
