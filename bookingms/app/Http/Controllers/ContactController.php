<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // (Optional) Send email or store in database
        // Mail::to('your@email.com')->send(new ContactFormMail($validated));

        // Redirect with success message
        return back()->with('success', 'Thank you for contacting us!');
    }
}

