<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\parentMail;
use Illuminate\Support\Facades\DB;

class parentController extends Controller
{
    // add parent
    public function addparent(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'contact' => 'required',
                'address' => 'required',
                'child_ren' => 'required',
            ]);

            $parent = parents::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'gender' => $validatedData['gender'],
                'email' => $validatedData['email'],
                'phone_no' => $validatedData['phone_no'],
                'contact' => $validatedData['contact'],
                'address' => $validatedData['address'],
                'child_ren' => $request['child_ren'],
            ]);

            // Generate a password reset token
            $token = \Illuminate\Support\Str::random(60);

            // Save the token in the password_resets table
            DB::table('password_reset_tokens')->insert([
                'email' => $validatedData['email'],
                'token' => \Illuminate\Support\Facades\Hash::make($token),
                'created_at' => now(),
            ]);

            // Send welcome email with password reset link
            $title = 'Welcome to LMS';
            $body = 'Thank you for participating! Please set your password by clicking the link below: ' . $validatedData['email'];
            Mail::to($validatedData['email'])->send(new parentMail($title, $body));

            return response()->json(['success' => true, 'message' => 'Parent added successfully! Welcome email sent.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
