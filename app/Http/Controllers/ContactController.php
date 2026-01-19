<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function send(Request $request){
         $validated = $request->validate([
            'full_name'    => 'required|string|min:3|max:100',
            'phone'   => 'required|string|regex:/^\+?[0-9]{8,15}$/',
            'program'   => 'required',
            'message' => 'required|string|min:10|max:2000',
        ]);

        Mail::to('manar.abudayyeh@thirtysix36.com')
            ->send(new ContactFormMail($validated));


        return back()->with('success', __('contact_us.success_sent'));
    }
}
