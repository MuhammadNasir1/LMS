<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\parentMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

            // Generate a password
            $password = \Illuminate\Support\Str::random(8);

            $user = User::create([
                'name' => $validatedData['first_name'] . $validatedData['last_name'],
                'email' => $validatedData['email'],
                'role' => 'parent',
                'password' => Hash::make($password),

            ]);

            // Send welcome email with password
            $email = $validatedData['email'];
            $Mpassword = $password;
            Mail::to($validatedData['email'])->send(new parentMail($email, $Mpassword));
            return response()->json(['success' => true, 'message' => 'Parent added successfully!  email sent.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}