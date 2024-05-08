<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\words;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class coursesController extends Controller
{
    //  addd course
    public function addcourse(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "course_name" => "required",
                "level" => "required",
                "lesson" => "required",
                "word" => "required",
                "audio_1" => "nullable|max:2048",
                "audio_2" => "nullable|max:2048",
                "audio_3" => "nullable|max:2048",
            ]);
            $course = courses::create([
                'course_name' => $validatedData['course_name'],
            ]);
            foreach ($request['word'] as $j => $wordData) {
                $word = words::create([
                    'course_id' => $course->id,
                    'course_name' => $course->course_name,
                    'level' => $validatedData['level'][$j],
                    'lesson' => $validatedData['lesson'][$j],
                    'word' => $validatedData['word'][$j],
                ]);

                // Loop through audio files
                for ($i = 1; $i <= 3; $i++) {
                    $audioFieldName = "audio_$i";
                    if ($request->hasFile("$audioFieldName.$j")) {
                        $audioFile = $request->file("$audioFieldName.$j");
                        $audioName = time() . '_' . $audioFile->getClientOriginalName(); // Use original name instead of extension
                        $audioFile->storeAs('public/audio', $audioName);
                        $word->$audioFieldName = 'storage/audio/' . $audioName; // Assign the file path to the dynamic field name
                    }
                }

                // Save the word data including audio file paths
                $word->save();
            }








            return response()->json(['success' => true, 'message' =>  "course add successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function coursedata()
    {
        try {
            $courses = words::all();

            // Format the created_at attribute for each course
            foreach ($courses as $course) {
                $course->created_at_formatted = $course->created_at->format('Y-m-d H:i:s');
            }

            return response()->json(['success' => true, 'message' => "Course get successful", 'courses' => $courses], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function updatecourse(Request $request, $id)
    {
        try {
            $course = words::find($id);
            if (!$course) {
                return response()->json(['success' => false, 'message' => 'course not found'], 500);
            }

            for ($i = 1; $i <= 3; $i++) {
                $audioFieldName = "audio_$i";
                if ($request->hasFile("$audioFieldName")) {
                    $audioFile = $request->file("$audioFieldName");
                    $audioName = time() . '_' . $audioFile->getClientOriginalName(); // Use original name instead of extension
                    $audioFile->storeAs('public/audio', $audioName);
                    $course->$audioFieldName = 'storage/audio/' . $audioName; // Assign the file path to the dynamic field name
                }
            }
            $course->update($request->except('audio_1', 'audio_2', 'audio_3'));
            return response()->json(['success' => true, 'message' =>  "course add successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // delete course
    function  deleteCourse($id)
    {
        try {
            $course = words::where('id', $id)->first();
            if (!$course) {
                return response()->json(['success' => false, 'message' =>  "course not found"], 200);
            }

            $course->delete();
            return response()->json(['success' => true, 'message' =>  "course delete successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function getcoursedata()
    {
        $courses =  words::all();


        return view('course', ['courses' => $courses]);
    }

    public function getteachingWords($id)
    {
        $words = words::where('id', $id)->first();
        return response()->json(['success' => true, 'words' => $words]);
    }


    public function getcourseUpdataData($id)
    {

        try {

            $course = words::where('id',  $id)->first();
            if (!$course) {
                return response()->json(['success' => false, 'message' => 'Course  not found'], 500);
            }
            return response()->json(['success' => false, 'message' => 'Data get successfull', 'course' => $course], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
