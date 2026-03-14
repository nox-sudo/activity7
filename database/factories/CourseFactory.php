<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\RoboticsKit;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    // Counter to generate unique course keys
    private static int $counter = 105;

    public function definition()
    {
        $kitIds   = RoboticsKit::pluck('id')->toArray();
        $subjects = [
            'Introduction to', 'Fundamentals of', 'Advanced', 'Principles of',
            'Applied', 'Programming for', 'Design with', 'Sensors in',
            'Automation with', 'Control Systems for',
        ];
        $topics = [
            'Robotics', 'Automation', 'Embedded Systems', 'Artificial Intelligence',
            'Machine Learning', 'Computer Vision', 'IoT', 'PLC Programming',
            'Servo Motors', 'Arduino', 'Raspberry Pi', 'Robot Kinematics',
            'Path Planning', 'Industrial Robots', 'Collaborative Robots',
        ];

        $key = 'Rob' . self::$counter++;

        return [
            'course_key'        => $key,
            'title'             => $this->faker->randomElement($subjects)
                                   . ' ' . $this->faker->randomElement($topics),
            'cover'             => 'covers/' . $this->faker->slug(3) . '.jpg',
            'content'           => $this->faker->paragraphs(3, true),
            'didactic_material' => $this->faker->paragraphs(2, true),
            'kit_id'            => $this->faker->randomElement($kitIds),
        ];
    }
}
