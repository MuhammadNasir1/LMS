<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\students;
use App\Models\teacher;
use App\Models\teacher_rec;
use App\Models\training;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{


    public function language_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
    // dashboard  Users Couny
    public function adminDashboard()
    {
        $parentsCount = parents::count();
        $studentsCount = students::count();
        $teachersCount = teacher::count();

        return view('admin.dashboard', compact('parentsCount', 'studentsCount', 'teachersCount'));
    }

    public function parentDashboard()
    {
        return view('parent.dashboard');
    }

    public function teacherDashboard()
    {
        $trainingCount = training::count();
        $videoCount = teacher_rec::count();
        return view('teacher.dashboard', compact('trainingCount', 'videoCount'));
    }

     // permission


     public function permissionView()
     {
         return view('admin.user_permission');
     }
}
