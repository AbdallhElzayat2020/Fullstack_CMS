<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use function App\Helpers\getLanguage;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::with('author')->where(['is_breaking_news' => 1,])
            ->activeNews()->withLocalize()->orderBy('id', 'asc')->take(8)->get();

        return view('frontend.home', compact('breakingNews'));
    }
}
