<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\students;
use App\Models\teacher;
use App\Models\teacher_rec;
use App\Models\teaching;
use App\Models\words;
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
        try {
            $validatedData  = $request->validate([
                'teacher_comment' => 'required',
                'video' => 'nullable',

            ]);
            $teacherRec = teacher_rec::create([
                'student_id' => session("wordDet")['student_id'],
                'student_name' => session("wordDet")['student_name'],
                'teacher_id' => $userId,
                'lesson_date' => session("wordDet")['lesson_date'],
                'teacher_name' => session("user_det")['name'],
                'teacher_comment' => $validatedData['teacher_comment'],
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


    public  function  getteacherrecording()
    {

        $recordingData = teacher_rec::all();
        return view('std_recording',  ['recordingData' => $recordingData]);
    }


    public function teachingData()
    {
        $students = students::all();
        $words = words::all();
        $courses = courses::all();
        return view('teacher.teachingpage', ['students' => $students, 'courses' =>  $courses, 'words' => $words]);
    }


    public function filterOptions(Request $request)
    {
        if ($request->has('course_id')) {
            // Get levels  adn lesson based on the selected course
            $courseId = $request->input('course_id');
            $levels = words::where('course_id', $courseId)->get();
            return response()->json(['levels' => $levels, 'lessons' => $levels,  'words' => $levels]);
        } elseif ($request->has('level_id')) {
            // Get lessons based on the selected level
            $levelId = $request->input('level_id');
            $lessons = words::where('level', $levelId)->get();
            return response()->json(['lessons' => $lessons, 'words' => $lessons]);
        }
    }
    //  teaching page filters

    function filtersCourse(Request $request)
    {
        try {

            if ($request->has('course')) {
                $courseId = $request->input('course');
                $courses = courses::all();
                $words = words::where('course_id', $courseId)->get();
                return response()->json(['success' =>  true, 'message' => 'Data get  Successfully',  'words' => $words], 200);
            } else {

                $courses = courses::all();
                $words = words::all();
                return response()->json(['success' =>  true, 'message' => 'Data get  Successfully', 'courses' => $courses, 'words' => $words], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' =>  false, 'message' => $e->getMessage()], 500);
        }
    }


    // delete teacher screen recording
    public function  delRecording($id)
    {
        try {
            $recording = teacher_rec::find($id);
            if (!$recording) {
                return response()->json(['success' => false, 'message' => 'Recording not found'], 500);
            }
            // Delete  file from storage if it exists
            if (!empty($recording->video)) {
                $file_path = public_path($recording->video);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $recording->delete();
            return response()->json(['success' => true, 'message' => 'Recording successfully delete'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
