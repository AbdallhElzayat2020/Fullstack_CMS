<?php

namespace App\Repositories;

use App\Interfaces\AdminContactRepositoryInterface;
use App\Models\Contact;
use App\Models\Language;

class AdminContactRepository implements AdminContactRepositoryInterface
{

    public function index()
    {
        $languages = Language::all();
        $socialLinks= Contact::all();
        return view('dashboard.pages.contact.index', compact('languages'));
    }

    public function update($request)
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
