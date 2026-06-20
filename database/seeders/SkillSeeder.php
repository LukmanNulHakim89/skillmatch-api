<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Python', 'category' => 'Programming'],
            ['name' => 'Java', 'category' => 'Programming'],
            ['name' => 'PHP', 'category' => 'Programming'],
            ['name' => 'JavaScript', 'category' => 'Programming'],
            ['name' => 'Flutter', 'category' => 'Mobile'],
            ['name' => 'React', 'category' => 'Frontend'],
            ['name' => 'Laravel', 'category' => 'Backend'],
            ['name' => 'SQL', 'category' => 'Database'],
            ['name' => 'MongoDB', 'category' => 'Database'],
            ['name' => 'Tableau', 'category' => 'Data'],
            ['name' => 'Power BI', 'category' => 'Data'],
            ['name' => 'Statistics', 'category' => 'Data'],
            ['name' => 'Machine Learning', 'category' => 'AI'],
            ['name' => 'Deep Learning', 'category' => 'AI'],
            ['name' => 'NLP', 'category' => 'AI'],
            ['name' => 'UI/UX Design', 'category' => 'Design'],
            ['name' => 'Figma', 'category' => 'Design'],
            ['name' => 'Cyber Security', 'category' => 'Security'],
            ['name' => 'Linux', 'category' => 'System'],
            ['name' => 'Docker', 'category' => 'DevOps'],
            ['name' => 'Git', 'category' => 'Tools'],
            ['name' => 'Public Speaking', 'category' => 'Soft Skill'],
            ['name' => 'Problem Solving', 'category' => 'Soft Skill'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}