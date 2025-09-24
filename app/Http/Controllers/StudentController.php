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
            'email' => 'required|string|email|unique:students,email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        if ($validatedData) {
            $student = Student::create([
                'name' => $validatedData['name'],
                'birth_date' => $validatedData['birth_date'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
            ]);

            if(!$student) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occured on creating a Student',

                ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Student created successfully',
                        'data' => $student
                    ], 201);
            }
        }
}

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function toggleStudentStatus(){

    }

}