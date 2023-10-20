<?php

namespace Database\Factories;

use App\Enum\Gender;
use App\Models\BoardingSchool;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $boardingSchoolId = BoardingSchool::first()->id;
        $user = User::create([
            'name' => $this->faker->userName(),
            'email' => $this->faker->safeEmail(),
            'password' => bcrypt('secret'),
            'boarding_school_id' => $boardingSchoolId
        ]);
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(Gender::toArray()),
            'phone_number' => "08" . zerofill(rand(0, 9999999999), 10),
            'user_id' => $user->id,
            'boarding_school_id' => $boardingSchoolId
        ];
    }
}
