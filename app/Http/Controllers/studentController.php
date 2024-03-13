<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\students;
use Illuminate\Validation\ValidationException;

class studentController extends Controller
{
    // add student
    public function addstudent(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "full_name" => "required|string",
                "gender" => "required|string",
                "dob" => "required|date",
                "phone_no" => "required",
                "address" => "required|string",
                "Campus" => "required|string",
                "student_no" => "required",
                "grade" => "required",
            ]);
            $student = Students::create([
                'full_name' => $validatedData['full_name'],
                'chinese_name' => $request['chinese_name'],
                'gender' => $validatedData['gender'],
                'dob' => $validatedData['dob'],
                'phone_no' => $validatedData['phone_no'],
                'adress' => $validatedData['address'],
                'em_person' => $request['em_person'],
                'em_relation' => $request['relation'],
                'em_phone' => $request['em_phone'],
                'campus' => $validatedData['Campus'],
                'School_attending' => $request['sch_attending'],
                'student_no' => $validatedData['student_no'],
                'grade' => $validatedData['grade'],
            ]);
            return response()->json(['success' => true, 'message' => 'Data added successfully', 'student'  => $student], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // delete student
    public function delstudent($std_id)
    {
        try {

            $student = students::find($std_id);
            if (!$student) {
                return response()->json(['success' => false, 'message' => 'Student not found'], 500);
            }

            $student->delete();
            return response()->json(['success' => true, 'message' => 'Student successfully delete'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    // update Student

    public  function updatestudent(Request $request,  $std_id)
    {

        try {
            $student = students::find($std_id);

            if (!$student) {
                return response()->json(['success' => false, 'error' => 'Student not found'], 404);
            }

            $student->update($request->all());

            return response()->json(['success' => true,  'message' => 'Student updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,  'error' => 'Error updating student record'], 500);
        }
    }

    // get Student data from data base

    public function getStdData()
    {
        try {

            $students = students::all();
            return response()->json(['success' => true,  'student' => $students], 200);
        } catch (\Exception $e) {

            return response()->json(['success' => false,  'error' => $e->getMessage()], 500);
        }
    }
}
