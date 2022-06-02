<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies', compact('companies'));
    }

    public function store(CompanyStoreRequest $request)
    {
        $data = $request->only('title', 'address', 'founded_at');
        $path = $request->file('logo')->store('company');
        $data['logo'] = $path;
        Company::create($data);

        return back()->setStatusCode(201);
    }
}
