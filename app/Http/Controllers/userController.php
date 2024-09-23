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
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $studentsMonthCount = DB::table('students')
            ->select(DB::raw('MONTH(created_at) as month, COUNT(*) as count'))
            ->where('created_at', '>=', Carbon::now()->subMonths(4))
            ->groupBy('month')
            ->get()
            ->map(function ($item) {
                $item->month_name = Carbon::create()->month($item->month)->format('M');
                return $item;
            });

        return view('admin.dashboard', compact('parentsCount', 'studentsCount', 'teachersCount', 'studentsMonthCount'));
    }

    public function parentDashboard()
    {
        return view('parent.dashboard');
    }

    public function teacherDashboard()
    {
        $id   = session("user_det")['user_id'];
        $lessons = teacher_rec::where('teacher_id', $id)->count();
        $today = Carbon::today();
        $today_lessons = teacher_rec::where('created_at', $today)->orWhere('teacher_id', $id)->count();

        $trainingCount = training::count();
        $videoCount = teacher_rec::count();
        return view('teacher.dashboard', compact('trainingCount', 'videoCount', 'lessons', 'today_lessons'));
    }

    // permission


    public function permissionView()
    {

        $users = User::where('role', '<>', 'superAdmin')->get();
        $permissions = [];
        foreach ($users as $user) {
            $permissions[$user->permission] = json_decode($user->permission, true);
        }
        return view('admin.user_permission', ['users' => $users, 'permissions' => $permissions]);
    }

    public  function changePermission(Request $request, $user_id)
    {
        try {

            $validatedData = $request->validate([
                'insert' => 'nullable',
                'delete' => 'nullable',
                'update' => 'nullable',
            ]);
            $user =  User::find($user_id);

            $permissions = [
                'insert' => isset($validatedData['insert']) ? true : false,
                'delete' => isset($validatedData['delete']) ? true : false,
                'update' => isset($validatedData['update']) ? true : false,
            ];
            $user->permission = json_encode($permissions);
            $user->save();
            return redirect('../admin/permission');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }


    public function getAdminDashboard()
    {
        $Total_Students = students::all()->count();
        $Total_parents = parents::all()->count();
        $Total_teachers = teacher::all()->count();
        $Total_training = training::all()->count();

        $data[] =  ['totalStudent' => $Total_Students, 'totalParents' => $Total_parents, 'totalTeacher' => $Total_teachers, 'totalTraining' =>  $Total_training];
        return response()->json(['success' => true, 'message' => "Data get successfully",  "data" => $data], 200);
    }
}
