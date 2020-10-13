<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', [
            'companies' => $companies
        ]);
    }

    public function create()
    {
        return view('companies.createOrUpdate');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => [
                'required',
                'max:255',
                'unique:companies,name'
            ],
            'email' => [
                'email',
                'nullable',
                'unique:companies,email'
            ],
            'website' => [
                'nullable',
                'unique:companies,website'
            ],
            'logo' => [
                'file'
            ]
        ]);

        $logo = request()
            ->file('logo');

        if ($logo) {
            $attributes['logo'] = request()
                ->file('logo')
                ->store('logos');
        }

        Company::create($attributes);

        return redirect()
            ->route('dashboard');
    }

    public function show($id)
    {
        $company = Company::find($id);
        $companyEmployees = Employee::where('company_id', '=', $id)
            ->paginate(10);


        return view('companies.show', [
            'company' => $company,
            'employees' => $companyEmployees
        ]);
    }

    public function edit($id)
    {
        $company = Company::find($id);

        return view('companies.createOrUpdate', [
            'company' => $company
        ]);
    }

    public function update($id)
    {
        $attributes = request()->validate([
            'name' => [
                'required',
                'max:255',
                'unique:companies,name,' . $id
            ],
            'email' => [
                'email',
                'nullable',
                'unique:companies,email,' . $id
            ],
            'website' => [
                'nullable',
                'unique:companies,website,' . $id
            ],
            'logo' => [
                'file'
            ]
        ]);

        $logo = request()
            ->file('logo');

        if ($logo) {
            $attributes['logo'] = request()
                ->file('logo')
                ->store('logos');
        }

        Company::where('id', $id)
            ->update($attributes);

        return redirect("/view/{$id}");
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect("");
    }
}
