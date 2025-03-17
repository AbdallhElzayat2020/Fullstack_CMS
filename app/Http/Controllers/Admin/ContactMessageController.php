<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\RecivedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = RecivedMail::all();
        return view('dashboard.pages.contact-message.index', compact('messages'));
    }

    public function sendReplay(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:800'],
        ]);

        /* Send Mail */
        try {
            $email = $request->email;
            $subject = $request->subject;
            $message = $request->message;
            $fromEmail = Contact::where('language', 'en')->first();

            Mail::to($email)->send(new ContactMail($subject, $message, $fromEmail->email));

            toast(__('Mail sent successfully!'), 'success');

            return redirect()->back();

        } catch (\Exception $exception) {
            toast(__($exception->getMessage()), 'error');
            return redirect()->back();
        }

//        toast(__('Mail sent successfully'), 'success')->width('400px');
//        return redirect()->back();
    }
}
