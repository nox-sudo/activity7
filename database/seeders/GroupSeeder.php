<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $groups = [
            ['name' => 'Beginner Group A',    'level' => 'beginner'],
            ['name' => 'Intermediate Group A', 'level' => 'intermediate'],
            ['name' => 'Advanced Group A',     'level' => 'advanced'],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
