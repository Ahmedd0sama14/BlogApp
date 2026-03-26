<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    public function view()
    {
        return view('Themes.contact');
    }
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        Contact::create($data);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
