<?php

namespace Database\Seeders;

use App\Models\RoboticsKit;
use Illuminate\Database\Seeder;

class RoboticsKitSeeder extends Seeder
{
    public function run()
    {
        $kits = [
            [
                'name'        => 'StarterKit',
                'description' => 'Basic robotics kit for beginners. Includes motors, sensors and basic structure components.',
                'brand'       => 'RoboLearn',
            ],
            [
                'name'        => 'Educational Robotics Kit',
                'description' => 'Intermediate kit designed for programming-focused robotics courses.',
                'brand'       => 'EduRobot',
            ],
            [
                'name'        => 'Kit5',
                'description' => 'Advanced kit with servo motors, ultrasonic sensors and Bluetooth module.',
                'brand'       => 'TechBot',
            ],
        ];

        foreach ($kits as $kit) {
            RoboticsKit::create($kit);
        }
    }
}
