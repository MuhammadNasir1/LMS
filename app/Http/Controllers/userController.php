<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
class userController extends Controller
{


    public function language_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
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


    // add parent
    public function addparent(Request $request)
    {
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

        $parent = parents::create([]);
    }
    // send opt in parent email
    public function sendWelcomeEmail()
    {
        $title = 'LMS';
        $body = 'Thank you for participating!';

        Mail::to('nmian7080@gmail.com')->send(new OtpMail($title, $body));

        return "Email sent successfully!";
    }
}
