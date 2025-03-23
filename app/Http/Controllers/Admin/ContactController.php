<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminContactRepositoryInterface;
use App\Models\Contact;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ContactController extends Controller
{
    public $contact;

    public function __construct(AdminContactRepositoryInterface $contact)
    {
        $this->contact = $contact;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('show contact page', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('update about page', 'admin'), only: ['update']),
        ];
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
