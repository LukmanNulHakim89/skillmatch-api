<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\UserInterestController;
use App\Http\Controllers\UserProgressController;

// Auth Routes (public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (butuh login)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    // Skills & Interests
    Route::get('/skills', [SkillController::class, 'index']);
    Route::get('/interests', [InterestController::class, 'index']);

    // User Skills & Interests
    Route::post('/user/skills', [UserSkillController::class, 'store']);
    Route::get('/user/skills', [UserSkillController::class, 'index']);
    Route::post('/user/interests', [UserInterestController::class, 'store']);
    Route::get('/user/interests', [UserInterestController::class, 'index']);

    // Career Recommendation
    Route::get('/careers', [CareerController::class, 'index']);
    Route::get('/careers/recommend', [CareerController::class, 'recommend']);
    Route::get('/careers/{id}/gap', [CareerController::class, 'gapAnalysis']);

    // Roadmap
    Route::get('/careers/{id}/roadmap', [RoadmapController::class, 'index']);

    // Progress
    Route::get('/user/progress', [UserProgressController::class, 'index']);
    Route::post('/user/progress', [UserProgressController::class, 'store']);
});