<?php

namespace App\Http\Controllers;

use App\Models\training;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class trainingController extends Controller
{
    public function  addTraining(Request $request)
    {
        try {
            $validatedData  = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'video' => 'required'
            ]);

            $training = training::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'duration' => $request['duration'],
                'date' => $request['date'],
            ]);
            if ($request->hasFile('video')) {
                $training_video = $request->file('video');
                $videoName = time() . '.' . $training_video->getClientOriginalExtension();
                $training_video->storeAs('public/trainingVideo', $videoName); // Adjust storage path as needed
                $training->video = 'storage/trainingVideo/' . $videoName;
            }

            $training->save();
            return response()->json(['success' => true, 'message' => 'Training add successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function  trainingdata(Request $request)
    {

        try {

            return response()->json(['success' => true, 'message' => 'Training data  successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function  delTraining($training_id)
    {
    }


    public function  updateTraining(Request $request, $training_id)
    {
    }
}
