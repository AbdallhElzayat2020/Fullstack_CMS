<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('dashboard.pages.contact.index', compact('languages'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'address' => ['required', 'string', 'max:300'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'min:8', 'max:20'],
        ]);
        Contact::updateOrCreate(
            ['language' => $request->language],
            [
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ],
        );
        toast(__('updated successfully'), 'success')->width('400px');

        return redirect()->back();
    }
}
