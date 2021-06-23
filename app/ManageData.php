<?php

namespace App;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ManageData
{
    /**
     * Delete content in companies and contacts tables.
     */
    public function deleteData()
    {
        DB::statement("SET foreign_key_checks=0");
        Company::truncate();
        Contact::truncate();
        DB::statement("SET foreign_key_checks=1");
    }

    /**
     * Store company information in database.
     *
     * @param Object $company_data
     * @return Company $company
     */
    public function createCompany(Object $company_data): Company
    {
        $company = Company::create([
            'name' => $company_data->properties->name,
            'domain' => $company_data->properties->domain,
            'description' => $company_data->properties->description,
            'phone' => $company_data->properties->phone,
            'industry' => $company_data->properties->industry,
            'number_of_employees' => $company_data->properties->numberofemployees,
            'annual_revenue' => $company_data->properties->annualrevenue,
            'city' => $company_data->properties->city,
            'zip_code' => $company_data->properties->zip,
            'country' => $company_data->properties->country,
        ]);

        return $company;
    }

    /**
     * Store contact information in database.
     *
     * @param Object $contact_data
     * @return Contact $contact
     */
    public function createContact(object $contact_data, int $company_id): Contact
    {
        $contact = Contact::create([
            'first_name' => $contact_data->properties->firstname->value,
            'last_name' => $contact_data->properties->lastname->value,
            'email' => $contact_data->properties->email->value,
            'ID_company' => $company_id,
        ]);

        return $contact;
    }
}
