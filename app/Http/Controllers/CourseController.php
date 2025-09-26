<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();

        if($courses->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No courses found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Courses retrieved successfully',
            'data' => $courses
        ], 200);

    }

    public function show($id){
        $course = Course::where('id', $id)->first();

        if(!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found',
            ]);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Course retrieved successfully',
            'data' => $course
        ]);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'course_code' => 'required|string|unique:courses,course_code',
            'course_name' => 'required|string',
            'discription' => 'required|string',
            'units' => 'required|integer|min: 1',
        ]);

        if($validatedData){
            $course = Course::create([
                'course_code' => $validatedData['course_code'],
                'course_name' => $validatedData['course_name'],
                'discription' => $validatedData['discription'],
                'units' => $validatedData['units'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Course created successfully',
                'data' => $course
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
        ]);

    }

    public function update(Request $request, $id){
        $course = Course::where('id', $id)->first();

        if(!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found',
            ]);
        }

        $validatedData = $request->validate([
            'course_code' => 'required|string|unique:courses,course_code,' . $id,
            'course_name' => 'required|string',
            'discription' => 'required|string',
            'units' => 'required|integer|min: 1',
        ]);

        if($validatedData){
            $course->update([
                'course_code' => $validatedData['course_code'],
                'course_name' => $validatedData['course_name'],
                'discription' => $validatedData['discription'],
                'units' => $validatedData['units'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Course updated successfully',
                'data' => $course
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
        ]);

    }

    public function destroy($id){
        $course = Course::where('id', $id)->first();

        if(!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found',
            ]);
        }

        $course->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Course deleted successfully',
        ]);

    }

}
