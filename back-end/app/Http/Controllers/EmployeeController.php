<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function postEmployee(Request $request)
    {
        $emp = new Employee();

        $emp->emp_fname = $request->input('emp_fname');
        $emp->emp_lname = $request->input('emp_lname');
        $emp->emp_dob = $request->input('emp_dob');
        $emp->emp_section = $request->input('emp_section');
        $emp->emp_phone = $request->input('emp_phone');
        $emp->emp_email = $request->input('emp_email');
        $emp->emp_address = $request->input('emp_address');

        $emp->save();
        if(false !=$emp)
        {
            return response()->json(['status'=>'success','message'=>"Saved Successfully...!!!"], 200);

        }
        else{
            return response()->json(['status'=>'failed','message'=>"Error in saving please try again...!!!"]);
        }

    }

    public function getEmployee()
    {
        $employeeList = Employee::all();

        return response()->json(['emplist'=>$employeeList], 200);
    }

    public function deleteEmployee($id)
    {
        $emp = Employee::where('emp_id', $id);

        if(!$emp)
        {
            return response()->json(['msg'=>"No Employee found"], 404);

        }
        $emp-> delete();
        return response()->json(['msg'=>"Employee deleted Successfully"], 201);

    }

    public function editEmployee($emp_id, Request $request)
    {
        $emp = Employee::find($emp_id);

        if(!$emp)
        {
            return response()->json(['msg'=>"No Employee found"], 404);

        }

        $emp->emp_fname = $request->input('emp_fname');
        $emp->emp_lname = $request->input('emp_lname');
        $emp->emp_dob = $request->input('emp_dob');
        $emp->emp_section = $request->input('emp_section');
        $emp->emp_phone = $request->input('emp_phone');
        $emp->emp_email = $request->input('emp_email');
        $emp->emp_address = $request->input('emp_address');

        $emp->save();
        return response()->json(['msg'=>$emp], 200);


    }

    public function getEmployeeById($id)
    {
        $emp = Employee::where('emp_id', $id)->first();

        if(!$emp)
        {
            return response()->json(['msg'=>"No Employee found"], 404);

        }

        $response = [
            'employee' => $emp
        ];
        $emp-> get();
        return response()->json($response , 200);
    }

    
}
