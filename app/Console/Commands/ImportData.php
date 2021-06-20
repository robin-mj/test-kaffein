<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

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
        // Collecting data from API
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.hubapi.com/crm/v3/objects/companies/?properties=name,domain,description,industry,numberofemployees,annualrevenue,city,country,zip,phone&hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response);
        }

        // Delete old data
        Company::truncate();

        // Importing each company data into database
        foreach ($response->results as $companyData) {
            $company = new Company;

            $company->name = $companyData->properties->name;
            $company->domain = $companyData->properties->domain;
            $company->description = $companyData->properties->description;
            $company->phone = $companyData->properties->phone;
            // $company->email = $companyData->properties->email;
            $company->industry = $companyData->properties->industry;
            $company->number_of_employees = $companyData->properties->numberofemployees;
            $company->annual_revenue = $companyData->properties->annualrevenue;
            $company->city = $companyData->properties->city;
            $company->zip_code = $companyData->properties->zip;
            $company->country = $companyData->properties->country;


            $company->save();
        }
    }
}
