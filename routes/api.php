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

// Get all courses a student is enrolled in
Route::get('/students/{id}/courses', [App\Http\Controllers\StudentController::class, 'getCourses']);

// Get all students enrolled in a course
Route::get('/courses/{id}/students', [App\Http\Controllers\CourseController::class, 'getStudents']);

// Get all enrollments for a specific semester and year
Route::get('/enrollments/semester/{semester}/year/{year}', [App\Http\Controllers\EnrollmentController::class, 'getBySemesterAndYear']); 

// Get all enrollments for a specific block
Route::get('/enrollments/block/{block}', [App\Http\Controllers\EnrollmentController::class, 'getByBlock']);

// Get all enrollments with a specific status
Route::get('/enrollments/status/{status}', [App\Http\Controllers\EnrollmentController::class, 'getByStatus']);

// Get all enrollments with a specific grade
Route::get('/enrollments/grade/{grade}', [App\Http\Controllers\EnrollmentController::class, 'getByGrade']);

// Search students by name or email
Route::get('/students/search', [App\Http\Controllers\StudentController::class, 'search']);

// Search courses by course name or course code
Route::get('/courses/search', [App\Http\Controllers\CourseController::class, 'search']);

// Search enrollments by student name or course name
Route::get('/enrollments/search', [App\Http\Controllers\EnrollmentController::class, 'search']);