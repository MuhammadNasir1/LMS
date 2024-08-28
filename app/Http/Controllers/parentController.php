<?php

namespace App\Http\Controllers;

use App\Models\parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\parentMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

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
                'email' => 'required|email|unique:parents,email',
                'phone_no' => 'required',
                'contact' => 'required',
                'address' => 'required',
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

            // Send  email with password
            $email = $validatedData['email'];
            $Mpassword = $password;
            Mail::to($validatedData['email'])->send(new parentMail($email, $Mpassword));
            return response()->json(['success' => true, 'message' => 'Parent added successfully!  email sent.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // get parent data from  data  base
    public function parantdata()
    {
        try {
            $parantdate = parents::all();
            return response()->json(['success' => true, 'message' => 'Data get successfully', 'parent' => $parantdate], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


    // delete parant
    public function  delparent($parent_id)
    {
        try {

            $parent = parents::find($parent_id);
            if (!$parent) {
                return response()->json(['success' => false, 'message' => 'parent not found'], 500);
            } else {
                $user  = User::where('email', $parent->email)->first();
                $user->delete();
                $parent->delete();
            }
            return response()->json(['success' => true, 'message' => 'parent successfully delete'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // Update parant

    public function updateparent(Request $request,  $parent_id)
    {

        try {
            $parent = parents::find($parent_id);
            if (!$parent) {
                return response()->json(['success' => false, 'message' => 'Parent not found'], 500);
            }
            // Generate a password
            if ($parent->email !== $request->email) {
                $password = \Illuminate\Support\Str::random(8);

                $user = User::where('email', $parent->email);
                $user->update(['email' => $request->email, 'password' => hash::make($password)]);

                $email = $request['email'];
                $Mpassword = $password;
                Mail::to($request['email'])->send(new parentMail($email, $Mpassword));
            }
            $parent->update($request->all());
            return response()->json(['success' => true, 'message' => 'Parent successfully updated and new mail send'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // get parent data
    public function getparentdata()
    {

        $parents = parents::all();
        return view('admin.parent', ['parents' => $parents]);
    }

    public function parentUpdataData(Request $request, $parent_id)
    {

        try {
            $parent = parents::find($parent_id);
            return response()->json(['success' => true,  'message' => 'Data get successfull', 'parent' => $parent], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => true,  'message' => $e->getMessage()], 500);
        }
    }

    public function editParantData($id)
    {
        $parentData = parents::find($id);
        $parents = parents::all();
        return view('admin.parent', compact('parents',  'parentData'));
    }

    // add data with ecxcel fil
    public function importParent(Request $request)
    {
        try {

            $validateData = $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            $file = $request->file('excel_file');

            $data = Excel::toArray([], $file);

            foreach (array_slice($data[0], 1) as $row) {
                parents::create([
                    'first_name' => $row[0],
                    'last_name' => $row[1],
                    'gender' => $row[2],
                    'email' => $row[3],
                    'phone_no' => $row[4],
                    'contact' => $row[5],
                    'address' => $row[6],
                    'child_ren' => $row[7],
                ]);
            }

            return redirect()->back();
            // return response()->json("data Add successfully");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
