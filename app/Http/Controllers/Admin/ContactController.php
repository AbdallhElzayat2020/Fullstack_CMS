<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminContactRepositoryInterface;
use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $contact;

    public function __construct(AdminContactRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        return $this->contact->index();
    }

    public function update(Request $request)
    {
        return $this->contact->update($request);
    }
}
