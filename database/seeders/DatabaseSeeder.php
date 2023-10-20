<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enum\UserRole;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\Database\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (UserRole::toArray() as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $this->call(BoardingSchoolSeeder::class);
        $this->call(CohortSeeder::class);
        $this->call(ClassRoomSeeder::class);
        $this->call(DormRoomSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
