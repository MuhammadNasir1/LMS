<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Http\Request;
use  App\Models\students;
use App\Models\words;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class studentController extends Controller
{
    // add student
    public function addstudent(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "parent_id" => "required",
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
                'parent_id' => $validatedData['parent_id'],
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
                'verification' => "Pending",
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
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
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
            return response()->json(['success' => true, 'message' => 'Data Get successfully',  'student' => $students], 200);
        } catch (\Exception $e) {

            return response()->json(['success' => false,   'message' => $e->getMessage()], 500);
        }
    }


    //  get student data form data base

    public  function getstudentdata()
    {
        $userId = session('user_det')['user_id'];
        $students = students::all();
        $parents = parents::all();

        $ParentStudents = students::where('parent_id', $userId)->get(); // Add get() to execute the query
        return view('student', ['students' => $students, 'ParentStudents' => $ParentStudents, 'parents' => $parents]);
    }

    public function studentViewData(Request $request, $id)
    {
        try {
            $student = students::find($id);
            return response()->json(['success' => true,  'message' => 'Data get successfull', 'student' => $student], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => true,  'message' => $e->getMessage()], 500);
        }
    }


    public function teachingStudentData()
    {
        $students = students::all();
        $words = words::all();
        return view('teacher.teachingpage', ['students' => $students, 'words' =>  $words]);
    }


    // get student  for parents role

    public  function  parentStudentData($parent_id)
    {
        try {
            $students   = students::where('parent_id', $parent_id)->get();
            if (!$students) {
                return response()->json(['success' =>  false, 'message' => "parent not found"]);
            }

            return response()->json(['success' =>  true, 'message' => "Data get successfully", 'students' => $students], 200);
        } catch (\Exception $e) {
            return response()->json(['success'  => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function editStudentData($id)
    {
        $studentData = students::find($id);
        $students = students::all();
        return view('student', compact('studentData', 'students'));
    }


    // add data with ecxcel fil
    public function importStudent(Request $request)
    {
        try {

            $validateData = $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            $file = $request->file('excel_file');

            $data = Excel::toArray([], $file);

            foreach (array_slice($data[0], 1) as $row) {
                students::create([
                    'full_name' => $row[0],
                    'chinese_name' => $row[1],
                    'gender' => $row[2],
                    'dob' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('Y-m-d'),
                    'phone_no' => $row[4],
                    'adress' => $row[5],
                    'em_person' => $row[6],
                    'em_relation' => $row[7],
                    'em_phone' => $row[8],
                    'campus' => $row[9],
                    'School_attending' => $row[10],
                    'student_no' => $row[11],
                    'grade' => $row[12],
                    'verification' => "Approved",
                ]);
            }

            return redirect()->back();
            // return response()->json("data Add successfully");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }


    public function changeVerifictionStatus(Request $request, $id)
    {
        $student = students::find($id);
        $student->verification = $request['status'];
        $student->update();
        return redirect()->back();
    }
}
