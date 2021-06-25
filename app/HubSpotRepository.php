<?php

namespace App;

use GuzzleHttp\Client;

class HubSpotRepository
{
    /**
     * Get all companies and needed properties from API created after 09/06/2021.
     *
     * @return Array $companies_data
     */
    public function getCompanies(): array
    {
        $client = new Client(['base_uri' => 'https://api.hubapi.com/']);


        $response = $client->post('crm/v3/objects/companies/search?hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'body' => '{
                "filterGroups":[{"filters":[{"value":"1623196800000","propertyName":"createdate","operator":"GTE"}]}],
                "properties": [ "name", "domain", "description", "industry", "numberofemployees", "annualrevenue", "city", "country", "zip", "phone" ]
            }',
        ]);

        $body = $response->getBody();
        $arr_body = json_decode($body);
        $companies_data = $arr_body->results;

        return $companies_data;
    }

    /**
     * Get the contact id of the chosen company.
     *
     * @param Int $company_id
     * @return Int $contact_id
     */
    public function getContactId(Int $company_id): int
    {
        $client = new Client(['base_uri' => 'https://api.hubapi.com/']);

        $response = $client->get('https://api.hubapi.com/companies/v2/companies/' . $company_id . '/contacts?hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab');

        $body = $response->getBody();
        $arr_body = json_decode($body);

        $contact_id = $arr_body->contacts[0]->vid;

        return $contact_id;
    }

    /**
     * Get all the contact properties needed of the chosen contact.
     *
     * @param Int $contact_id
     * @return Object $arr_body
     */
    public function getContactProperties(Int $contact_id): object
    {
        $client = new Client(['base_uri' => 'https://api/hubapi.com/']);

        $response = $client->get('https://api.hubapi.com/contacts/v1/contact/vid/' . $contact_id . '/profile?property=firstname&property=lastname&property=email&property=phone&property=hs_avatar_filemanager_key&hapikey=c56639c1-1983-4523-9a62-f4a0fe22e6ab');

        $body = $response->getBody();
        $arr_body = json_decode($body);

        return $arr_body;
    }
}
