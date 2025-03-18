<?php

namespace App\Repositories;

use App\Interfaces\AdminContactMessageRepositoryInterface;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\RecivedMail;
use Illuminate\Support\Facades\Mail;

class AdminContactMessageRepository implements AdminContactMessageRepositoryInterface
{

    public function index()
    {
        RecivedMail::query()->update(['seen' => 1]);
        $messages = RecivedMail::all();

        return view('dashboard.pages.contact-message.index', compact('messages'));
    }

    public function sendReplay($request)
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

            $makeReplied = RecivedMail::find($request->message_id);
            $makeReplied->replied = 1;
            $makeReplied->save();

            toast(__('Mail sent successfully!'), 'success');

            return redirect()->back();

        } catch (\Exception $exception) {
            toast(__($exception->getMessage()), 'error');
            return redirect()->back();
        }
    }
}
