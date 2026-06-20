<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Skill;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    // Tampilkan semua karier
    public function index()
    {
        $careers = Career::with('skills')->get();
        return response()->json($careers);
    }

    // Rekomendasi karier berdasarkan skill user
    public function recommend(Request $request)
    {
        $user = $request->user();

        // Ambil skill ID yang dimiliki user
        $userSkillIds = $user->skills()->pluck('skills.id')->toArray();

        if (empty($userSkillIds)) {
            return response()->json([
                'message' => 'Kamu belum menambahkan skill apapun.',
            ], 400);
        }

        $careers = Career::with('skills')->get();
        $recommendations = [];

        foreach ($careers as $career) {
            // Ambil hanya skill Required
            $requiredSkills = $career->skills()
                ->wherePivot('importance', 'Required')
                ->pluck('skills.id')
                ->toArray();

            if (empty($requiredSkills)) continue;

            // Hitung berapa skill yang cocok
            $matched = count(array_intersect($userSkillIds, $requiredSkills));
            $total   = count($requiredSkills);

            // Hitung persentase kecocokan
            $matchPercentage = round(($matched / $total) * 100);

            $recommendations[] = [
                'career'         => $career->name,
                'industry'       => $career->industry,
                'match'          => $matchPercentage . '%',
                'matched_skills' => $matched,
                'total_required' => $total,
            ];
        }

        // Urutkan dari yang paling cocok
        usort($recommendations, fn($a, $b) =>
            $b['matched_skills'] - $a['matched_skills']
        );

        return response()->json($recommendations);
    }

    // Gap Analysis — skill apa yang masih kurang
    public function gapAnalysis(Request $request, $id)
    {
        $user   = $request->user();
        $career = Career::with('skills')->findOrFail($id);

        // Skill yang dimiliki user
        $userSkillIds = $user->skills()->pluck('skills.id')->toArray();

        $requiredSkills = [];
        $missingSkills  = [];
        $ownedSkills    = [];

        foreach ($career->skills as $skill) {
            $importance = $skill->pivot->importance;

            if ($importance === 'Required') {
                $requiredSkills[] = $skill->name;

                if (in_array($skill->id, $userSkillIds)) {
                    $ownedSkills[] = $skill->name;
                } else {
                    $missingSkills[] = $skill->name;
                }
            }
        }

        $total   = count($requiredSkills);
        $matched = count($ownedSkills);
        $match   = $total > 0 ? round(($matched / $total) * 100) : 0;

        return response()->json([
            'career'          => $career->name,
            'match'           => $match . '%',
            'owned_skills'    => $ownedSkills,
            'missing_skills'  => $missingSkills,
            'total_required'  => $total,
        ]);
    }
}