<?php

namespace Database\Factories;

use App\Enum\Gender;
use App\Models\BoardingSchool;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DormRoom>
 */
class DormRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num = rand(1, 20);
        return [
            'name' => "Gedung $num kamar $num",
            'boarding_school_id' => BoardingSchool::first()->id,
            'gender' => $this->faker->randomElement(Gender::toArray())
        ];
    }
}
