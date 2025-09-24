<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Test route
Route::get('/test', function (Request $request) {
    return response()->json(['message' => 'API is working!']);
});

// Get all  students
Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']);

// Get a single student
Route::get('/students/{id}', [App\Http\Controllers\StudentController::class, 'show']);

// Create a new student
Route::post('/students', [App\Http\Controllers\StudentController::class, 'store']);

// Update a existing student
Route::put('/students/{id}', [App\Http\Controllers\StudentController::class, 'update']);

// Delete a student
Route::delete('/students/{id}', [App\Http\Controllers\StudentController::class, 'destroy']);

// Toggle student status
Route::post('/students/{id}/toggle-status', [App\Http\Controllers\StudentController::class, 'toggleStudentStatus']); 