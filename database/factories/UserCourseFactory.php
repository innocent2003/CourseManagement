<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserCourse;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserCourse>
 */
class UserCourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            //
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'course_id' => function () {
                return \App\Models\Course::factory()->create()->id;
            },

            // 'user_id' => $this->faker->rand(1,10),

            // 'course_id' =>$this->faker->rand(1,10)
        ];
    }
}
