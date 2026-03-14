<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'Admon',
                'email'    => 'admon@robotics.com',
                'password' => Hash::make('Adm@2022'),
                'role'     => 'administrative',
                'group_id' => null,
            ],
            [
                'username' => 'Tecmilenio',
                'email'    => 'tecmilenio@robotics.com',
                'password' => Hash::make('Adm@2022'),
                'role'     => 'teacher',
                'group_id' => null,
            ],
            [
                'username' => 'Student',
                'email'    => 'student@robotics.com',
                'password' => Hash::make('Adm@2022'),
                'role'     => 'student',
                'group_id' => 1, // Assign to the first group (beginner)
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
