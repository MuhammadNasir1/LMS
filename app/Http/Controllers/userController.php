<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{


    public function language_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }


    public function register(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|in:teacher,admin,parent',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
                'password' => Hash::make($validatedData['password']),
            ]);

            $token = $user->createToken($request->email)->plainTextToken;
            session(['user_det' => [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role' => $validatedData['role'],
            ]]);
            return response()->json([
                'token' => $token,
                'success' => true,
                'user' => $user,
                'message' => 'Register successful',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
                'errors' => $e->validator->getMessageBag(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([

                'email' => "required",
                'password' => "required|string|min:8",
            ]);


            $user = User::where('email',  $request->email)->first();
            $role = $user->role;
            $name = $user->name;
            if ($user && Hash::check($request->password, $user->password)) {

                $token = $user->createToken($request->email)->plainTextToken;
                session(['user_det' => [
                    'name' => $name,
                    'email' => $validatedData['email'],
                    'role' =>  $role,
                ]]);
                return  response()->json([
                    'token' => $token,
                    'message' => 'login  Successful',
                    'success' => true,
                    'user' => $user,
                ],  200);
            } else {

                return response()->json([
                    'message' => 'Wrong credentials',
                    'success' => false,
                    'status' => 'eror',
                ], 422);
            }
        } catch (\Exception $eror) {

            return response()->json([
                'message' =>  'login failed',
                'success' => false,
                'error' => $eror->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        try {
            auth()->user()->tokens()->delete();
            return response()->json([
                'message' =>  'logout successfully',
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  'logout faild',
                'success' => false,
                'eror' => $e->getMessage(),
            ],  500);
        }
    }


    public function changepasword(Request $request)
    {

        try {
            $request->validate([
                'password' => "required|confirmed",
            ]);
            $loginuser = auth()->user();
            $loginuser->password = Hash::make($request->password);
            $loginuser->save();
            return response()->json([
                "message" => "password change successfull",
                'success' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "password not change ",
                'success' => false,
                'eror' => $e->getMessage(),
            ], 500);
        }
    }


    public function weblogout(Request $request)
    {

        $request->session()->forget('user_det');
        $request->session()->regenerate();
        return redirect('/');
    }


    // add student

    public function addstudent(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "full_name" => "required",
                "gender" => "required",
                "dob" => "required|date",
                "phone_no" => "required",
                "address" => "required",
                "Campus" => "required",
                "student_no" => "required",
                "grade" => "required",
            ]);
            $student = Students::create([
                'full_name' => $validatedData['full_name'],
                'chinese_name' => $request['chinese_name'],
                'gender' => $validatedData['gender'],
                'dob' => $validatedData['dob'],
                'phone_no' => $validatedData['phone_no'],
                'adress' => $validatedData['address'],
                'em_person' => $request['em_person'],
                'em_relation' => $request['relation'],
                'em_phone' => $request['em_phone'],
                'campus' => $validatedData['Campus'],
                'School_attending' => $request['sch_attending'],
                'student_no' => $validatedData['student_no'],
                'grade' => $validatedData['grade'],
            ]);


            return response()->json(['success' => true, 'message' => 'Data added successfully', 'student'  => $student], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
