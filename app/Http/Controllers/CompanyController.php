<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $company->name = strtolower($company->name);
            if ($company->country == 'United States') {
                $company->country = 'États-Unis';
            }
        }

        return Inertia::render('Index', [
            'companies' => $companies,
        ]);
    }
}
