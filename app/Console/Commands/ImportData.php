<?php

namespace App\Console\Commands;

use DateTime;
use App\HubSpotRepository;
use App\ManageData;
use App\Models\Company;
use App\Models\Contact;
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
     */
    public function handle()
    {
        $repository = new HubSpotRepository;
        $manage_data = new ManageData;

        $manage_data->deleteData();

        $companies_data = $repository->getCompanies();

        // Importing each company and contacts into database
        foreach ($companies_data as $company_data) {

            $company = $manage_data->createCompany($company_data);
            $company_id = $company->id;

            $contact_id = $repository->getContactId($company_data->id);
            $contact_data = $repository->getContactProperties($contact_id);

            $manage_data->createContact($contact_data, $company_id);
        }
    }
}
