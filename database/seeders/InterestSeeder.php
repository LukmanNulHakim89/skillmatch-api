<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Interest;

class InterestSeeder extends Seeder
{
    public function run(): void
    {
        $interests = [
            ['name' => 'Artificial Intelligence'],
            ['name' => 'Mobile Development'],
            ['name' => 'Web Development'],
            ['name' => 'Data Science'],
            ['name' => 'Cyber Security'],
            ['name' => 'UI/UX Design'],
            ['name' => 'DevOps'],
            ['name' => 'Business Analysis'],
            ['name' => 'Game Development'],
            ['name' => 'Cloud Computing'],
        ];

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}