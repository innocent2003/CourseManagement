<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = $this->faker->dateTimeBetween('-1 year','+1 year');
        $endTime = (clone $startTime)->modify('+'.rand(1,4).'year');
        return [
            //
            'name' => $this->faker->words(3,true),
            'description' => $this->generateRandomDescription(),
            'start_time' =>$startTime,
            'end_time' => $endTime
        ];
    }
    private function generateRandomDescription($length = 200)
    {

        $faker = \Faker\Factory::create();
        $paragraph = $faker->paragraph;


        return substr($paragraph, 0, $length);
    }
}
