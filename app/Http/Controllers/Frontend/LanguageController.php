<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //$language=Language::where('lang',$request->language_code);
        session(['language' => $request->language_code]);
        return response(['status' => 'success']);
    }
}
