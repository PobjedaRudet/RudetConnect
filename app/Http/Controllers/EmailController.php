<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function showEmailPage()
    {
        return view('send-email');
    }

    // Handle the button click and send the email
    public function sendEmail(Request $request)
    {
        $email = 'h.ahmet@pobjeda.com'; // Recipient email address
        $user = (object) ['name' => 'Ahmet']; // Example user data

        // Send the email
        SendWelcomeEmail::dispatch($user, $email);
        Mail::to($email)->send(new WelcomeEmail($user));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
