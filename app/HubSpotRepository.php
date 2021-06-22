<?php

namespace App;

use GuzzleHttp\Client;

class HubSpotRepository
{
    public function getCompanies()
    {
        $client = new Client(['base_uri' => 'https://api.hubapi.com/']);

        $response = $client->get('crm/v3/objects/companies?properties=name,domain,description,industry,numberofemployees,annualrevenue,city,country,zip,phone&hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab');

        $body = $response->getBody();
        $arr_body = json_decode($body);
        $companies_data = $arr_body->results;

        return $companies_data;
    }

    public function getContactId(int $company_id)
    {
        $client = new Client(['base_uri' => 'https://api.hubapi.com/']);

        $response = $client->get('https://api.hubapi.com/companies/v2/companies/' . $company_id . '/contacts?hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab');

        $body = $response->getBody();
        $arr_body = json_decode($body);

        $contact_id = $arr_body->contacts[0]->vid;

        return $contact_id;
    }

    public function getContactProperties(int $contact_id)
    {
        $client = new Client(['base_uri' => 'https://api/hubapi.com/']);

        $response = $client->get('https://api.hubapi.com/contacts/v1/contact/vid/' . $contact_id . '/profile?hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab');

        $body = $response->getBody();
        $arr_body = json_decode($body);

        return $arr_body;
    }
}
