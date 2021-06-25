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
        'logo_url',
    ];

    /**
     * Filter the companies to be shown in the view according to the filter chosen by user and order them by name.
     *
     * @param $filter
     * @return Collection $companies
     */
    public function filterCompanies(?String $filter): Collection
    {
        if ($filter == 'consumer_electronics') {
            $companies = Company::where('industry', 'CONSUMER_ELECTRONICS')->orderBy('name')->get();
        } else if ($filter == 'food_beverages') {
            $companies = Company::where('industry', 'FOOD_BEVERAGES')->orderBy('name')->get();
        } else if ($filter == 'computer_software') {
            $companies = Company::where('industry', 'COMPUTER_SOFTWARE')->orderBy('name')->get();
        } else {
            $companies = Company::orderBy('name')->get();
        }

        return $companies;
    }

    /**
     * Replace companies data by understandable words for user.
     *
     * @param Collection $companies
     * @return Collection $companies
     */
    public function replaceData(Collection $companies): Collection
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
