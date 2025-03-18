<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminContactMessageRepositoryInterface;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\RecivedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{

    public $message;

    public function __construct(AdminContactMessageRepositoryInterface $message)
    {
        $this->message = $message;
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
