<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\UserCourse;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $users = User::all();
        $courses = Course::all();

        // Gán mỗi người dùng với 1-3 khóa học ngẫu nhiên
        $users->each(function ($user) use ($courses) {
            $user->courses()->attach(
                $courses->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // UserCourse::factory(20)->create();
    }
}
