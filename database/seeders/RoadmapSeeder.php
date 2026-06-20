<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roadmap;
use App\Models\Career;

class RoadmapSeeder extends Seeder
{
    public function run(): void
    {
        $dataAnalystCareer = Career::where('name', 'Data Analyst')->first();
        if ($dataAnalystCareer) {
            $roadmaps = [
                ['month' => 1, 'title' => 'Dasar Statistik & SQL', 'description' => 'Pelajari statistik dasar dan SQL untuk query data.'],
                ['month' => 2, 'title' => 'Python untuk Data', 'description' => 'Belajar Python dengan library Pandas dan NumPy.'],
                ['month' => 3, 'title' => 'Visualisasi Data', 'description' => 'Belajar Tableau dan Power BI untuk membuat dashboard.'],
                ['month' => 4, 'title' => 'Portfolio Project', 'description' => 'Buat proyek analisis data nyata untuk portofolio.'],
            ];
            foreach ($roadmaps as $r) {
                Roadmap::create(array_merge($r, ['career_id' => $dataAnalystCareer->id]));
            }
        }

        $mlCareer = Career::where('name', 'Machine Learning Engineer')->first();
        if ($mlCareer) {
            $roadmaps = [
                ['month' => 1, 'title' => 'Python & Matematika ML', 'description' => 'Pelajari Python, aljabar linear, dan kalkulus dasar.'],
                ['month' => 2, 'title' => 'Machine Learning Dasar', 'description' => 'Pelajari algoritma ML dengan Scikit-learn.'],
                ['month' => 3, 'title' => 'Deep Learning', 'description' => 'Pelajari neural network dengan TensorFlow atau PyTorch.'],
                ['month' => 4, 'title' => 'Deploy Model ML', 'description' => 'Belajar deploy model ML ke production.'],
            ];
            foreach ($roadmaps as $r) {
                Roadmap::create(array_merge($r, ['career_id' => $mlCareer->id]));
            }
        }
    }
}