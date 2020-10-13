<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create($companyId)
    {
        return view('employees.createOrUpdate', [
            'companyId' => $companyId
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'firstName' => [
                'required',
                'max:20'
            ],
            'lastName' => [
                'required',
                'max:20'
            ],
            'email' => [
                'email',
                'nullable', '
                unique:employees,email'
            ],
            'phone' => [
                'nullable',
                'unique:employees,phone'
            ],
            'company_id' => [
                'required',
                'integer'
            ]
        ]);

        Employee::create($attributes);

        return redirect()
            ->route('view', [
                'id' => request()->input('company_id')
            ]);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        $company = Company::find($employee->company_id);

        return view('employees.show', [
            'employee' => $employee,
            'company' => $company
        ]);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $company = Company::find($employee->company_id);

        return view('employees.createOrUpdate',
            [
                'employee' => $employee,
                'companyId' => $company->id,
                'currentCompany' => $company->name
            ]);
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'firstName' => [
                'required',
                'max:20'
            ],
            'lastName' => [
                'required',
                'max:20'
            ],
            'email' => [
                'email',
                'nullable',
                'unique:employees,email,' . $id
            ],
            'phone' => [
                'nullable',
                'unique:employees,phone,' . $id
            ],
            'currentCompany' => [
                'nullable',
                'exists:companies,name'
            ]
        ]);

        $company = Company::where('name', '=', request()
            ->input('currentCompany'))
            ->get()
            ->first();

        Employee::where('id', $id)
            ->update([
            'firstName' => $attributes['firstName'],
            'lastName' => $attributes['lastName'],
            'email' => $attributes['email'],
            'phone' => $attributes['phone'],
            'company_id' => $company->id,
        ]);

        return redirect("/view/{$company->id}");
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $companyId = $employee
            ->company
            ->id;
        $employee->delete();

        return redirect("view/{$companyId}");
    }
}
