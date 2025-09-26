<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        if($students->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No students found',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Students retrieved successfully',
            'data' => $students
        ], 200);
    }

    public function show($id){
        $students = Student::where('id', $id)->first();

        if(!$students) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found',
            ]);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Student retrieved successfully',
            'data' => $students
        ]);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        if($validatedData){
            $student = Student::create([
                'name' => $validatedData['name'],
                'birth_date' => $validatedData['birth_date'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address']
            ]);

            if(!$student){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to create student.'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Student created successfully.',
                'data' => $student
            ]);
        }
    }
        

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $student = Student::where('id', $id)->first();
        if(!$student){
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found.',
            ]);
        }

        $updatedStudent = $student->update([
            'name' => $validatedData['name'],
            'birth_date' => $validatedData['birth_date'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Student updated successfully.',
            'data' => $student
        ]);
    }

    public function destroy($id){
        $student = Student::where('id', $id)->first();
        if(!$student){
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found.',
            ]);
        }

        $student->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Student deleted successfully.',
        ]);
    }
    
}