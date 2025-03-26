<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminContactMessageRepositoryInterface;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\RecivedMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ContactMessageController extends Controller implements HasMiddleware
{

    public $message;

    public function __construct(AdminContactMessageRepositoryInterface $message)
    {
        $this->message = $message;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('show contact message', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('send mail contact message', 'admin'), only: ['sendReplay']),
        ];
    }

    public function index()
    {
        return $this->message->index();
    }

    public function sendReplay(Request $request)
    {
        return $this->message->sendReplay($request);
    }
}
