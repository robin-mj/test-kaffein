<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'domain',
        'description',
        'phone',
        'industry',
        'number_of_employees',
        'annual_revenue',
        'city',
        'zip_code',
        'country',
    ];

    public function filterCompanies($filter)
    {
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

        return $companies;
    }

    public function replaceData($companies)
    {
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

        return $companies;
    }
}
