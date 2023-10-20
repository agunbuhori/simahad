<?php

namespace Database\Factories;

use App\Enum\Gender;
use App\Enum\Religion;
use App\Models\ClassRoom;
use App\Models\Cohort;
use App\Models\DormRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classrooms = ClassRoom::pluck('id');
        $gender = $this->faker->randomElement(Gender::toArray());
        $dormrooms = DormRoom::where('gender', $gender)->pluck('id');

        return [
            'nis' => zerofill(rand(0, 999999), 6),
            'nisn' => zerofill(rand(0, 99999999), 8),
            'name' => $this->faker->name(),
            'birthplace' => $this->faker->city(),
            'birthdate' => $this->faker->dateTimeBetween(now()->addYears(-15), now()->addYears(-12)),
            'gender' => $gender,
            'religion' => Religion::ISLAM,
            'cohort_id' => Cohort::first()->id,
            'class_room_id' => $this->faker->randomElement($classrooms),
            'dorm_room_id' => $this->faker->randomElement($dormrooms),
        ];
    }
}
