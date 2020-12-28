<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Core\View;

class ContactController {
    public function index() {
        $contacts = (new Contact)->all();

        return View::render('contacts/index.html', [
            'contacts' => $contacts
        ]);
    }

    public function create() {
        return View::render('contacts/create.html');
    }

    public function store()
    {
        $contact = new Contact;
        $contact->create([
            'subject' => input('subject'),
            'email' => input('email'),
            'body' => input('body')
        ]);

        return response()->redirect('/contacts');
    }
}