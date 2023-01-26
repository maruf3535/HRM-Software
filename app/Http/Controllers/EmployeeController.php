<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function addEmployee($emp_id=-1)
    {
        $data = [
            'type_menu'                     => 'layout',
            'department_list'               => db::table('departments')->get(),
            'employee_type_list'            => db::table('employee_types')->get(),
            'employee_position_list'        => db::table('employee_positions')->get(),
        ];
        if($emp_id > 0){
            $data += [
                'basic_information'             => db::table('users')->where(['id' => $emp_id])->first(),
            ];
        }
        return view('employee.add-employee', ['data' => $data]);
        // return view('pages.forms-advanced-form', ['data' => $data]);
    }

    public function basicInformationSubmit(Request $req, $emp_id=-1)
    {

        $default_password = '12345';

        // Validate the data
        $req->validate(
           [
           'first_name'            => 'required',
        //    'email'                 => 'unique:users,email',
           'gender'                => 'required',
           'date_of_birth'         => 'required',
           'mobile_number'         => 'required',
           'joining_date'          => 'required',
           'billing_start_date'    => 'required',
           // 'password'              => 'required|min:5|max:30|confirmed'
           ],
           [
           'first_name.required'           => 'Please fill your first name.',
        //    'email.unique'                  => 'This email has been already taken.',
           'gender.required'               => 'Gender field is required.',
           'date_of_birth.required'        => 'Please select your date of birth.',
           'mobile_number.required'        => 'Please give your contact details.',
           'joining_date.required'         => 'Joining date field is required.',
           'billing_start_date.required'   => 'Billing start date field is required.',
           ]    
        );

        if($emp_id == -1){ // Insert data     
           // Insert into 'users' table
           $user                       = new User();
           $user->first_name           = $req->first_name;
           $user->middle_name          = $req->middle_name;
           $user->last_name            = $req->last_name;
           $user->nickname             = $req->nickname;
           $user->gender               = $req->gender;
           $user->dob                  = $req->date_of_birth;
           $user->email                = $req->email;
           $user->alter_email          = $req->alternative_email;
           $user->mobile_no	           = $req->mobile_number;
           $user->phone_no             = $req->phone_number;
           $user->joining_date         = $req->joining_date;
           $user->billing_start_date   = $req->billing_start_date;
           $user->password             = $default_password;
           // $user->password             = Hash::make($default_password);
           // $temp_std->password         = Hash::make($request->password);
           $user_save                  = $user->save();
        }
        else{ // Update the data
            $user                       = User::where(['id' => $emp_id])->first();
            $user->first_name           = $req->first_name;
            $user->middle_name          = $req->middle_name;
            $user->last_name            = $req->last_name;
            $user->nickname             = $req->nickname;
            $user->gender               = $req->gender;
            $user->dob                  = $req->date_of_birth;
            $user->email                = $req->email;
            $user->alter_email          = $req->alternative_email;
            $user->mobile_no	        = $req->mobile_number;
            $user->phone_no             = $req->phone_number;
            $user->joining_date         = $req->joining_date;
            $user->billing_start_date   = $req->billing_start_date;
            $user_save                  = $user->save();
        }

        if($user_save){
            $emp_id = User::where(['first_name' => $req->first_name, 'mobile_no' => $req->mobile_number])->first()->id;
            // $data = [
            //     'type_menu'                     => 'layout',
            //     'department_list'               => db::table('departments')->get(),
            //     'employee_type_list'            => db::table('employee_types')->get(),
            //     'employee_position_list'        => db::table('employee_positions')->get(),
            //     'basic_information'             => db::table('users')->where(['first_name' => $req->first_name, 'mobile_no' => $req->mobile_number])->first(),
            // ];
            return redirect(route('add.employee.page', ['emp_id' => $emp_id]));
        }
        else{
            echo "Unsuccess";
        }
    }

    public function setDepartmentName(Request $req)
    {
        // Validate the data
        $req->validate(
            [
            'set_department_name'            => 'required|unique:departments,department_name',
            ],
            [
            'set_department_name.unique'     => "This name has already been taken."
            ]
    );


        // Department form submitted withh time.

        $department                     = new Department();
        $department->department_name    = $req->set_department_name;
        $department_save                = $department->save();
        if($department_save){
            return redirect()->back();
        }
        else{
            $data = [
                'page_url' => url()->previous(),
                'msg' => 'Go Back'
            ];
            return view('error_pages.error-500', ['data' => $data]);
        }
    }

    public function employeeInformationSubmit(Request $req)
    {
         // Validate the data
         $req->validate(
            [
            'employee_department'       => 'required',
            'employee_type'             => 'required',
            'employee_position'         => 'required',
            'in_time'                   => 'required',
            'out_time'                  => 'required',
            ],
            [
            'employee_department.required'      => "Please Choose at least one.",
            'employee_type.required'            => "Please Choose at least one.",
            'employee_position.required'        => "Please Choose at least one.",
            'in_time.required'                  => "Please Choose in time.",
            'out_time.required'                 => "Please Choose out time.",
            ]
    );


        // Department form submitted withh time.

        $department                     = new Department();
        $department->department_name    = $req->set_department_name;
        $department_save                = $department->save();
        if($department_save){
            return redirect()->back();
        }
        else{
            $data = [
                'page_url' => url()->previous(),
                'msg' => 'Go Back'
            ];
            return view('error_pages.error-500', ['data' => $data]);
        }
    }
}