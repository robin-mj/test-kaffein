<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Filter the companies to be shown in the view according to the filter chosen by user.
     *
     * @param $filter
     * @return Collection $companies
     */
    public function filterCompanies(?String $filter): Collection
    {
        if ($filter == 'consumer_electronics') {
            $companies = Company::where('industry', 'CONSUMER_ELECTRONICS')->get();
        } else if ($filter == 'food_beverages') {
            $companies = Company::where('industry', 'FOOD_BEVERAGES')->get();
        } else if ($filter == 'computer_software') {
            $companies = Company::where('industry', 'COMPUTER_SOFTWARE')->get();
        } else {
            $companies = Company::all();
        }

        return $companies;
    }

    /**
     * Replace companies data by understandable words for user.
     *
     * @param $companies
     * @return Collection $companies
     */
    public function replaceData($companies): Collection
    {
        foreach ($companies as $company) {
            $replacements = [
                'United States' => 'États-Unis',
                'CONSUMER_ELECTRONICS' => 'Électronique grand public',
                'FOOD_BEVERAGES' => 'Aliments/Boissons',
                'COMPUTER_SOFTWARE' => 'Logiciels informatiques',
            ];

            $company->country = str_replace(array_keys($replacements), $replacements, $company->country);
            $company->industry = str_replace(array_keys($replacements), $replacements, $company->industry);
        }

        return $companies;
    }
}
