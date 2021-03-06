<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use GuzzleHttp\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $filter = request('filter');
        $companies = new Company;

        // Filter results and replace data where needed
        $companies = $companies->replaceData($companies->filterCompanies($filter));

        return Inertia::render('Index', [
            'companies' => $companies,
            'filter' => $filter,
        ]);
    }
}
