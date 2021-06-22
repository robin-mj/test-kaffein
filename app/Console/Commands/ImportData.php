<?php

namespace App\Console\Commands;

use DateTime;
use App\Models\Company;
use App\Models\Contact;
use App\HubSpotRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data collected from HubSpot API into database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $repository = new HubSpotRepository();

        // Delete old data
        DB::statement("SET foreign_key_checks=0");
        Company::truncate();
        Contact::truncate();
        DB::statement("SET foreign_key_checks=1");

        // Collecting companies data from API
        $companies_data = $repository->getCompanies();

        // Set minimum create date to allow company to be imported
        $limit_date = new DateTime('2021-06-09');

        // Importing each allowed company data into database
        foreach ($companies_data as $company_data) {
            $create_date = new DateTime(substr($company_data->properties->createdate, 0, 10));

            if ($create_date > $limit_date) {
                $company = new Company;

                $company->name = $company_data->properties->name;
                $company->domain = $company_data->properties->domain;
                $company->description = $company_data->properties->description;
                $company->phone = $company_data->properties->phone;
                $company->industry = $company_data->properties->industry;
                $company->number_of_employees = $company_data->properties->numberofemployees;
                $company->annual_revenue = $company_data->properties->annualrevenue;
                $company->city = $company_data->properties->city;
                $company->zip_code = $company_data->properties->zip;
                $company->country = $company_data->properties->country;

                $company->save();

                $contact_id = $repository->getContactId($company_data->id);
                $contact_data = $repository->getContactProperties($contact_id);

                // Store contact in database
                $contact = new Contact;

                $contact->first_name = $contact_data->properties->firstname->value;
                $contact->last_name = $contact_data->properties->lastname->value;
                $contact->email = $contact_data->properties->email->value;
                $contact->ID_company = $company->id;

                $contact->save();
            }
        }
    }
}
