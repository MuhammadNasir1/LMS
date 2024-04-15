<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use App\Models\teacher_rec;
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

            $count = count($request['course_id']);
            $teachingDataArray = [];
            for ($i = 0; $i < $count; $i++) {
                $teachingData = teaching::create([
                    "teacher_id" => $userId,
                    "student_id" => $request['studentid'],
                    "student_name" => $validatedData['student_name'],
                    "lesson_date" => $validatedData['lesson_date'],
                    "course" => $validatedData['course'],
                    "course_id" => $request['course_id'][$i],
                    "word_id" => $validatedData['word_id'][$i],
                    "word" => $validatedData['word'][$i],
                    "audio_1" => $request['audio1'][$i],
                    "audio_2" => $request['audio2'][$i],
                    "audio_3" => $request['audio3'][$i],
                ]);
                $teachingDataArray[] = $teachingData;
                $teachingData->save();
            }
            session(['teachingData' => $teachingDataArray]);
            session(['wordDet' => [
                "student_id" => $request['studentid'],
                "student_name" => $validatedData['student_name'],
                "lesson_date" => $validatedData['lesson_date'],
            ]]);
            // return response()->json(['success' => true, 'message'  => "data add successfully", 'teachingData'  =>   $teachingData], 200);
            return redirect('../video');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message'  => $e->getMessage()], 500);
        }
    }
    //  add  teacher recording
    public function teacherRecdata(Request $request)
    {
        $userId   = session("user_det")['user_id'];
        $currentDate = date('Y-m-d');
        try {
            $validatedData  = $request->validate([
                'teacher_comment' => 'required',
                'video' => 'nullable',

            ]);

            $teacherRec = teacher_rec::create([
                'student_id' => session("wordDet")['student_id'],
                'teacher_id' => $userId,
                'lesson_date' => session("wordDet")['lesson_date'],
                'teacher_name' => session("wordDet")['student_id'],
                'teacher_comment' => $validatedData['teacher_comment'],
                'duration' => '1:2',
            ]);
            if ($request->hasFile('video')) {
                $teaching_video = $request->file('video');
                $videoName = time() . '.' . $teaching_video->getClientOriginalExtension();
                $teaching_video->storeAs('public/teacherVideo', $videoName); // Adjust storage path as needed
                $teacherRec->video = 'storage/teacherVideo/' . $videoName;
            }

            $teacherRec->save();
            return response()->json(['success' => true, 'message' => 'Recording add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
