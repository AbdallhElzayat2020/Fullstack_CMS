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
        try {
            $subscribers = Subscriber::all();

            return view('dashboard.pages.subscribers.index', compact('subscribers'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            Subscriber::findOrFail($id)->delete();

            return response()->json(['status' => 'success', 'message' => __('deleted successfully!')]);
        }catch (\Exception $exception){
            return response()->json(['status' => 'error', 'message' => $exception->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
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
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }
}
