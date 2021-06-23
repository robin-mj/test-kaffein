<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index($id_company)
    {
        // Get the contact of the company
        $contact = Contact::where('ID_company', $id_company)->first();

        return $contact;
    }
}
