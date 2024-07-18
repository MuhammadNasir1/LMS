<?php

namespace App\Http\Controllers;

use App\Models\Gaming;
use Illuminate\Http\Request;

class GamingController extends Controller
{
    public function addGamingRecording(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'teacher_id' => "required",
                'student_id' => "required",
                'game_name' => "required",
                'recording' => "required",
                'description' => "required",

            ]);

            $gameData = Gaming::create([
                'teacher_id' => $validatedData['teacher_id'],
                'student_id' => $validatedData['student_id'],
                'game_name' => $validatedData['game_name'],
                'recording' => "null",
                'description' => $validatedData['description'],

            ]);
            if ($request->hasFile('recording')) {
                $image = $request->file('recording');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/gaming_videos', $imageName);
                $gameData->recording = 'storage/gaming_videos/' . $imageName;
            }
            $gameData->save();
            return response()->json(['success' => false, 'message' => "Data add successfully"], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
