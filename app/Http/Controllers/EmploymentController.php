<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;
use App\Models\Employee;
use App\Models\Firm;

class EmploymentController extends Controller
{
    public function store()
    {
        $employment = Employment::create([
            'employee_id' => request('employee_id'),
            'firm_id' => request('firm_id'),
        ]);
        return back()->with('success', __('Employee employed!'));
    }

    public function destroy($id)
    {
        $employee = Employee::with('firms')->findOrFail(request('employee_id'));
        $firmEmmployee = $employee->firms()->findOrFail($id);
        $firmEmmployee->employments()->delete();
        return back()->with('success', __('Employee unemployed!'));
    }
}
