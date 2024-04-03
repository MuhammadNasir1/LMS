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

            $word = words::create([
                'course_id' => $course->id,
                'level' => $validatedData['level'],
                'lesson' => $validatedData['lesson'],
                'word' => $validatedData['word'],
            ]);

            // Loop through audio files
            for ($i = 1; $i <= 3; $i++) {
                $audioFieldName = "audio_$i";
                if ($request->hasFile($audioFieldName)) {
                    $audioFile = $request->file($audioFieldName);
                    $audioName = time() . "_audio_$i." . $audioFile->getClientOriginalExtension();
                    $audioFile->storeAs('public/audio', $audioName);
                    $word->$audioFieldName = 'storage/audio/' . $audioName; // Assign the file path to the dynamic field name
                }
            }

            $word->save();

            return response()->json(['success' => true, 'message' =>  "course add successfull"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function coursedata()
    {
        try {
            $courses = courses::all();
            return response()->json(['success' => true, 'message' =>  "course add successfull", ['$courses' => $courses]], 200);
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
