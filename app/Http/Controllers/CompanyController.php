<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function getAll()
    {
        $company = Company::all();

        return $company;
    }

    public function getCompany($id)
    {
        $company = Company::find($id);

        return $company;
    }

    public function createCompany(Request $request)
    {
        $company = Company::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address
        ]);

        return $company;
    }

    public function updateCompany(Request $request)
    {
        $company = Company::find($request->company_id);

        $company->company_name = $request->company_name;
        $company->company_address = $request->company_address;


        $company->save();

        return 'Edit company completed';
    }

    public function deleteCompany($id)
    {
        $company = Company::find($id);

        $company->company_status = -10;

        $company->save();

        return 'Company Deleted';
    }
}
