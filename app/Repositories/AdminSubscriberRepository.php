<?php

namespace App\Repositories;

use App\Interfaces\AdminSubscriberRepositoryInterface;
use App\Mail\AdminNewsLetter;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberRepository implements AdminSubscriberRepositoryInterface
{
    public function index()
    {
        $subscribers = Subscriber::all();

        return view('dashboard.pages.subscribers.index', compact('subscribers'));
    }

    public function delete($id)
    {
        Subscriber::findOrFail($id)->delete();

        return response()->json(['status' => 'success', 'message' => __('deleted successfully!')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'min:5'],
        ]);
        /*
         * Send Email fir Users subscribers
         */

        $users = Subscriber::pluck('email')->toArray();

        Mail::to($users)->send(new AdminNewsLetter($request->subject, $request->message));

        toast('Mail Send successfully', 'success')->width('400px');
        return redirect()->back();
    }
}
