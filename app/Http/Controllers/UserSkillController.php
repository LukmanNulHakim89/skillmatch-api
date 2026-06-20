<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSkill;

class UserSkillController extends Controller
{
    // Lihat skill user
    public function index(Request $request)
    {
        $skills = $request->user()->skills()->get();
        return response()->json($skills);
    }

    // Tambah skill user
    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'level'    => 'required|in:Beginner,Intermediate,Advanced',
        ]);

        $user = $request->user();

        // Cek apakah skill sudah ada
        $exists = $user->skills()->where('skill_id', $request->skill_id)->exists();
        if ($exists) {
            return response()->json(['message' => 'Skill sudah ditambahkan.'], 400);
        }

        $user->skills()->attach($request->skill_id, [
            'level' => $request->level,
        ]);

        return response()->json(['message' => 'Skill berhasil ditambahkan!']);
    }
}