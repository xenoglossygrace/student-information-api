<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index(){
        $enrollments = Enrollment::all();

        if($enrollments->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No enrollments found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Enrollments retrieved successfully',
            'data' => $enrollments
        ], 200);
    }

    public function show($id){
        $enrollment = Enrollment::where('id', $id)->first();

        if(!$enrollment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Enrollment not found',
            ]);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Enrollment retrieved successfully',
            'data' => $enrollment
        ]);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required|string',
            'year' => 'required|string',
            'block' => 'required|integer',
            'status' => 'required|in:enrolled,completed,dropped',
            'grade' => 'nullable|numeric|min:1|max:5',
        ]);

        if($validatedData){
            $enrollment = Enrollment::create([
                'name' => $validatedData['name'],
                'student_id' => $validatedData['student_id'],
                'course_id' => $validatedData['course_id'],
                'semester' => $validatedData['semester'],
                'year' => $validatedData['year'],
                'block' => $validatedData['block'],
                'status' => $validatedData['status'],
                'grade' => $validatedData['grade'] ?? null,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Enrollment created successfully',
                'data' => $enrollment
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
            ], 400);
        }
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'semester' => 'required|string',
            'year' => 'required|string',
            'block' => 'required|integer',
            'status' => 'required|in:enrolled,completed,dropped',
            'grade' => 'nullable|numeric|min:1|max:5',
        ]);

        $enrollment = Enrollment::where('id', $id)->first();
        if(!$enrollment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Enrollment not found',
            ]);
        }

        $updated = $enrollment->update([
            'name' => $validatedData['name'],
            'student_id' => $validatedData['student_id'],
            'course_id' => $validatedData['course_id'],
            'semester' => $validatedData['semester'],
            'year' => $validatedData['year'],
            'block' => $validatedData['block'],
            'status' => $validatedData['status'],
            'grade' => $validatedData['grade'] ?? null,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Enrollment updated successfully',
            'data' => $enrollment
        ]);
    }

    public function destroy($id){
        $enrollment = Enrollment::where('id', $id)->first();
        if(!$enrollment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Enrollment not found',
            ]);
        }

        $enrollment->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Enrollment deleted successfully',
        ]);
    }

}
