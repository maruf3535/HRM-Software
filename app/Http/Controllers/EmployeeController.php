<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $data = [
            'type_menu' => 'layout',
        ];
        return view('employee.add-employee', ['data' => $data]);
    }

    public function basicInformationSubmit(Request $req)
    {
        // echo "<pre>";
        // print_r($req->all());

         // Validate the data
         $req->validate([
            'first_name'            => 'required',
            'middle_name'           => 'required',
            'last_name'             => 'required',
            'nickname'              => 'required',
            'email'                 => 'required|email|unique:users',
            'alternative_email'     => 'required|email',
            'gender'                => 'required',
            'date_of_birth'         => 'required',
            'mobile_number'         => 'required',
            'phone_number'          => 'required',
            // 'password'              => 'required|min:5|max:30|confirmed'
        ]);

        // Insert into 'temp_students' table
        $user                       = new User();
        $user->first_name           = $req->first_name;
        $user->middle_name          = $req->middle_name;
        $user->last_name            = $req->last_name;
        $user->nickname             = $req->nickname;
        $user->email                = $req->email;
        $user->alter_email          = $req->alternative_email;
        $user->gender               = $req->gender;
        $user->dob                  = $req->date_of_birth;
        $user->mobile_no	        = $req->mobile_number;
        $user->phone_no             = $req->phone_number;
        $user->password             = "12345";
        // $temp_std->password         = Hash::make($request->password);
        $user_save                  = $user->save();
        if($user_save){
            echo "Success";
        }
        else{
            echo "Unsuccess";
        }
        die();
        // return 
    }
}
