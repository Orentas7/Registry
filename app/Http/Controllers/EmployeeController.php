<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Firm;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index() 
    {
        return view('employees.index', [
            'employees' => Employee::with('firms')->get()
        ]);
    }

    public function create()
    {        
        return view('employees.create');
    }
    
    public function store(StoreEmployeeRequest $request)
    {    
        $attributes = $request->validated();
        Employee::create($attributes);
        return redirect('/employees')->with('success', __('Employee added!'));
    }

    public function edit(Employee $employee) 
    {
        $employee = Employee::with('firms')->findOrFail($employee->id);
        $firms = Firm::all()->except($employee->firms->modelKeys());
        return view('employees.edit', [
            'employee' => $employee,
            'firms' => $firms,
        ]);
    } 

    public function update(Employee $employee, StoreEmployeeRequest $request) 
    {
        $attributes = $request->validated();
        $employee->update($attributes);
        return back()->with('success', __('Employee updated!'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('success', __('Employee deleted!'));
    }
}
