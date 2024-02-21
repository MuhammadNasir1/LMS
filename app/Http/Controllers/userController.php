<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\DB;

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
            return response()->json([
                'token' => $token,
                'message' => 'Registration successful',
                'status' => 'success',
                'user' => $user,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'status' => 'fail',
                'errors' => $e->validator->getMessageBag(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Registration failed',
                'status' => 'error',
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
                'role' => 'required|in:teacher,admin,parent',
            ]);


            $user = User::where('email',  $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {

                $token = $user->createToken($request->email)->plainTextToken;
                return  response()->json([
                    'token' => $token,
                    'message' => 'login successful',
                    'status' => 'success',
                    'user' => $user,
                ],  200);
            } else {

                return response()->json([
                    'message' => 'Wrong credentials',
                    'status' => 'eror',
                ], 422);
            }
        } catch (\Exception $eror) {

            return response()->json([
                'message' =>  'login  failed',
                'status' =>  'eror',
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
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  'logout faild',
                'status' => 'eror',
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
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "password not change ",
                'status' => 'eror',
                'eror' => $e->getMessage(),
            ], 500);
        }
    }
}
