<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;
use App\Models\Skill;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        $careers = [
            [
                'name' => 'Data Analyst',
                'description' => 'Menganalisis data untuk menghasilkan insight bisnis.',
                'industry' => 'Technology',
                'skills' => [
                    ['name' => 'Python', 'importance' => 'Required'],
                    ['name' => 'SQL', 'importance' => 'Required'],
                    ['name' => 'Tableau', 'importance' => 'Required'],
                    ['name' => 'Power BI', 'importance' => 'Required'],
                    ['name' => 'Statistics', 'importance' => 'Required'],
                ],
            ],
            [
                'name' => 'Machine Learning Engineer',
                'description' => 'Membangun dan deploy model machine learning.',
                'industry' => 'Technology',
                'skills' => [
                    ['name' => 'Python', 'importance' => 'Required'],
                    ['name' => 'Machine Learning', 'importance' => 'Required'],
                    ['name' => 'Deep Learning', 'importance' => 'Required'],
                    ['name' => 'Statistics', 'importance' => 'Required'],
                    ['name' => 'SQL', 'importance' => 'Optional'],
                ],
            ],
            [
                'name' => 'Backend Developer',
                'description' => 'Membangun server-side aplikasi web.',
                'industry' => 'Technology',
                'skills' => [
                    ['name' => 'Laravel', 'importance' => 'Required'],
                    ['name' => 'PHP', 'importance' => 'Required'],
                    ['name' => 'SQL', 'importance' => 'Required'],
                    ['name' => 'Docker', 'importance' => 'Optional'],
                    ['name' => 'Git', 'importance' => 'Required'],
                ],
            ],
            [
                'name' => 'Mobile Developer',
                'description' => 'Membangun aplikasi mobile Android dan iOS.',
                'industry' => 'Technology',
                'skills' => [
                    ['name' => 'Flutter', 'importance' => 'Required'],
                    ['name' => 'Dart', 'importance' => 'Required'],
                    ['name' => 'Git', 'importance' => 'Required'],
                    ['name' => 'SQL', 'importance' => 'Optional'],
                ],
            ],
            [
                'name' => 'UI/UX Designer',
                'description' => 'Merancang tampilan dan pengalaman pengguna.',
                'industry' => 'Design',
                'skills' => [
                    ['name' => 'UI/UX Design', 'importance' => 'Required'],
                    ['name' => 'Figma', 'importance' => 'Required'],
                    ['name' => 'Public Speaking', 'importance' => 'Optional'],
                ],
            ],
            [
                'name' => 'Cyber Security Analyst',
                'description' => 'Melindungi sistem dari ancaman keamanan siber.',
                'industry' => 'Security',
                'skills' => [
                    ['name' => 'Cyber Security', 'importance' => 'Required'],
                    ['name' => 'Linux', 'importance' => 'Required'],
                    ['name' => 'Python', 'importance' => 'Optional'],
                    ['name' => 'Networking', 'importance' => 'Required'],
                ],
            ],
        ];

        foreach ($careers as $careerData) {
            $career = Career::create([
                'name'        => $careerData['name'],
                'description' => $careerData['description'],
                'industry'    => $careerData['industry'],
            ]);

            foreach ($careerData['skills'] as $skillData) {
                $skill = Skill::where('name', $skillData['name'])->first();
                if ($skill) {
                    $career->skills()->attach($skill->id, [
                        'importance' => $skillData['importance'],
                    ]);
                }
            }
        }
    }
}