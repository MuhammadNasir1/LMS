<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
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

    public function weblogout(Request $request)
    {

        $request->session()->forget('user_det');
        $request->session()->regenerate();
        return redirect('/');
    }
}
