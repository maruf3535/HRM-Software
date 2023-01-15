<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $data = [
            'type_menu' => 'layout',
        ];
        return view('employee.add-employee', ['data' => $data]);
    }
}
