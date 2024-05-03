<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactMail(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'g-recaptcha-response' => 'required|captcha'
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ];

        Mail::to('info@star2c.com')->send(new ContactMail($details));
        return redirect()->back()->with('status', 'Your Mail Has Been Sent');

    }
}
