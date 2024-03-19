<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    public function addteacher(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'dob' => 'required|date',
                'gender' => 'required',
                'phone_no' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'skill' => 'required',
                'join_date' => 'required',
                'address' => 'required',
                'teacher_cv' => 'nullable|image|mimes:jpeg,png,jpg,JPG,pdf',
            ]);

            $teacher = teacher::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'dob' => $validatedData['dob'],
                'gender' => $validatedData['gender'],
                'phone_no' => $validatedData['phone_no'],
                'email' => $validatedData['email'],
                'subject' => $validatedData['subject'],
                'skill' => $validatedData['skill'],
                'join_date' => $validatedData['join_date'],
                'address' => $validatedData['address'],
            ]);

            if ($request->hasFile('teacher_cv')) {
                $teacher_cv = $request->file('teacher_cv');
                $cvName = time() . '.' . $teacher_cv->getClientOriginalExtension();
                $teacher_cv->storeAs('public/teacherCv', $cvName); // Adjust storage path as needed
                $teacher->teacher_cv = 'storage/teacherCv/' . $cvName;
            }
            $teacher->save();
            return response()->json(['success' => false, 'message' => 'Teacher add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
