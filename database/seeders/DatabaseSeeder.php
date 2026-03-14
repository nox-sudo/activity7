<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Run in order to respect foreign key constraints
        $this->call([
            RoboticsKitSeeder::class, // 1. Kits first (no FK deps)
            GroupSeeder::class,       // 2. Groups (no FK deps)
            UserSeeder::class,        // 3. Users (depends on groups)
        ]);

        // 4. Create 100 fake courses using the factory
        Course::factory()->count(100)->create();

        // 5. Insert the 4 real courses from the client's Excel
        $realCourses = [
            ['course_key' => 'Rob101', 'title' => 'Introduction to Robotics',    'kit_id' => 1],
            ['course_key' => 'Rob102', 'title' => 'Introduction to Automation',  'kit_id' => 1],
            ['course_key' => 'Rob103', 'title' => 'Programming for Robotics',    'kit_id' => 2],
            ['course_key' => 'Rob104', 'title' => 'Characteristics of a Robot',  'kit_id' => 3],
        ];

        foreach ($realCourses as $course) {
            \App\Models\Course::create(array_merge($course, [
                'cover'             => 'covers/default.jpg',
                'content'           => 'Course content pending.',
                'didactic_material' => 'Didactic material pending.',
            ]));
        }
    }
}
