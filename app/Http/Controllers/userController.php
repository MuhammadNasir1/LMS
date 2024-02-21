<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;

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
                'password' => "required",
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
        // Delete all tokens associated with the authenticated user
        auth()->user()->tokens()->delete();

        // Return a JSON response indicating successful logout
        return response()->json([
            'message' =>  'Logged out successfully',
            'status' => 'success',
        ]);
    }
}
