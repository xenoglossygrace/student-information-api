<?php

use App\Models\Student;
use App\Models\Course;
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

// Get all courses
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index']);

// Get a single course
Route::get('/courses/{id}', [App\Http\Controllers\CourseController::class, 'show']);

// Create a new course
Route::post('/courses', [App\Http\Controllers\CourseController::class, 'store']);

// Update a existing course
Route::put('/courses/{id}', [App\Http\Controllers\CourseController::class, 'update']);

// Delete a course
Route::delete('/courses/{id}', [App\Http\Controllers\CourseController::class, 'destroy']);

// Get all enrollments
Route::get('/enrollments', [App\Http\Controllers\EnrollmentController::class, 'index']);

// Get a single enrollment
Route::get('/enrollments/{id}', [App\Http\Controllers\EnrollmentController::class, 'show']);

// Create a new enrollment
Route::post('/enrollments', [App\Http\Controllers\EnrollmentController::class, 'store']);

// Update a existing enrollment
Route::put('/enrollments/{id}', [App\Http\Controllers\EnrollmentController::class, 'update']);

// Delete a enrollment
Route::delete('/enrollments/{id}', [App\Http\Controllers\EnrollmentController::class, 'destroy']);

// Delete students in a specific ID range
Route::delete('/students/range/{start}/{end}', function ($start, $end) {
    Student::whereBetween('id', [$start, $end])->delete();

    return response()->json([
        'message' => 'Students deleted successfully'
    ]);
});

// Delete courses in a specific ID range
Route::delete('/courses/range/{start}/{end}', function ($start, $end) {
    Course::whereBetween('id', [$start, $end])->delete();

    return response()->json([
        'message' => 'Courses deleted successfully'
    ]);
});