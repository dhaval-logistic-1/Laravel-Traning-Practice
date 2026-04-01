<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {

        $toEmail = "dnparmar2712@gmail.com";
        $message = "Hello , Welcome to our website";
        $subject = "Welcome to iconbar";
        $detalis = [
            'name' => 'Dhaval parmar',
            'product' => 'laptop',
            'price' => 60000

        ];

        $request =  Mail::to($toEmail)->send(new welcomeemail($message, $subject, $detalis));

        dd($request);
    }

    public function contactForm()
    {

        return view('contact_form');
    }

    public function sendContactEmail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'file' => 'required|file|max:5048'
        ]);

        $filename = time() . '_' . $request->file('file')->extension();
        $request->file('file')->move(public_path('uploads'), $filename);

        $AdminEmail = "dhavalparmarlogisticinfotech@gmail.com";

        $responce = Mail::to($AdminEmail)->send(new welcomeemail($request->all(), $filename));

        if ($responce) {
            return back()->with('success', 'Email sent successfully!');
        } else {
            return back()->with('error', 'Failed to send email. Please try again.');
        }
    }
}
