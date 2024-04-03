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
            $validatedData  = $request->validate([
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
                'audio_2' => $request['audio_2'],
                'audio_3' => $request['audio_3'],
            ]);

            // Check and store audio_1
            if ($request->hasFile('audio_1')) {
                $audio_1 = $request->file('audio_1');
                $audioName1 = time() . '_audio_1.' . $audio_1->getClientOriginalExtension();
                $audio_1->storeAs('public/audio', $audioName1);
                $word->audio_1 = 'storage/audio/' . $audioName1;
            }

            // Check and store audio_2
            if ($request->hasFile('audio_2')) {
                $audio_2 = $request->file('audio_2');
                $audioName2 = time() . '_audio_2.' . $audio_2->getClientOriginalExtension();
                $audio_2->storeAs('public/audio', $audioName2);
                $word->audio_2 = 'storage/audio/' . $audioName2;
            }

            // Check and store audio_3
            if ($request->hasFile('audio_3')) {
                $audio_3 = $request->file('audio_3');
                $audioName3 = time() . '_audio_3.' . $audio_3->getClientOriginalExtension();
                $audio_3->storeAs('public/audio', $audioName3);
                $word->audio_3 = 'storage/audio/' . $audioName3;
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
