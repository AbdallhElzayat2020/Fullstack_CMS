<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function App\Helpers\getLanguage;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
}
