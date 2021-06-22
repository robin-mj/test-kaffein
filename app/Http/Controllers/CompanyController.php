<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $filter = request('filter');

        if ($filter == 'consumer_electronics') {
            $companies = Company::where('industry', 'CONSUMER_ELECTRONICS')->get();
        } else if ($filter == 'food_beverages') {
            $companies = Company::where('industry', 'FOOD_BEVERAGES')->get();
        } else if ($filter == 'computer_software') {
            $companies = Company::where('industry', 'COMPUTER_SOFTWARE')->get();
        } else {
            $filter = 'all';
            $companies = Company::all();
        }

        foreach ($companies as $company) {
            $company->name = strtolower($company->name);

            if ($company->country == 'United States') {
                $company->country = 'États-Unis';
            }

            if ($company->industry == 'CONSUMER_ELECTRONICS') {
                $company->industry = 'Électronique grand public';
            } else if ($company->industry == 'FOOD_BEVERAGES') {
                $company->industry = 'Aliments/Boissons';
            } else if ($company->industry == 'COMPUTER_SOFTWARE') {
                $company->industry = 'Logiciels informatiques';
            }
        }

        return Inertia::render('Index', [
            'companies' => $companies,
            'filter' => $filter,
        ]);
    }
}
