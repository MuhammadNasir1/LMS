<?php

namespace App\Http\Controllers;

use App\Models\teaching;
use Illuminate\Http\Request;

class teachingController extends Controller
{
    public function addteachingdata(Request $request)
    {
        try {
            $userId   = session("user_det")['user_id'];
            $validatedData  = $request->validate([
                "word_id" => "required",
                "student_name" => "required",
                "lesson_date" => "required",
                "course" => "required",
                "word" => "required",
            ]);

            // Example assuming $request['course_id'], $validatedData['word_id'], $validatedData['word'], $request['audio1'], $request['audio2'], and $request['audio3'] are arrays

            // Assuming each array has the same number of elements
            $count = count($request['course_id']);

            for ($i = 0; $i < $count; $i++) {
                $teachingData = teaching::create([
                    "teacher_id" => $userId,
                    "student_id" => $request['studentid'],
                    "student_name" => $validatedData['course'],
                    "lesson_date" => $validatedData['lesson_date'],
                    "course" => $validatedData['course'],
                    "course_id" => $request['course_id'][$i],
                    "word_id" => $validatedData['word_id'][$i],
                    "word" => $validatedData['word'][$i],
                    "audio_1" => $request['audio1'][$i],
                    "audio_2" => $request['audio2'][$i],
                    "audio_3" => $request['audio3'][$i],
                ]);

                // Save the model
                $teachingData->save();
            }

            return response()->json(['success' => true, 'message'  => "data add successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message'  => $e->getMessage()], 500);
        }
    }
}
