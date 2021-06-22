<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $filter = request('filter');
        $companies = new Company;
        $companies = $companies->replaceData($companies->filterCompanies($filter));

        return Inertia::render('Index', [
            'companies' => $companies,
            'filter' => $filter,
        ]);
    }
}
