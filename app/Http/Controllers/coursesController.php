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
            $courses = courses::all(); // Assuming 'Course' is your model for the 'courses' table
            $words = []; // Initialize an empty array to store words related to each course

            foreach ($courses as $course) {
                $words[$course->id] = words::where('course_id', $course->id)->get(); // Assuming 'Word' is your model for the 'words' table
            }

            $data = [
                'courses' => $courses,
                'words' => $words
            ];

            return response()->json(['success' => true, 'message' => "Course add successful", 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function updatecourse(Request $request, $id)
    {
        try {
            return response()->json(['success' => true, 'message' =>  "course add successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
