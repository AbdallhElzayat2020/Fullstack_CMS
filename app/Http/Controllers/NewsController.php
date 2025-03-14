<?php

namespace App\Http\Controllers;

use App\Interfaces\NewsSearchRepositoryInterface;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $news;

    public function __construct(NewsSearchRepositoryInterface $news)
    {
        $this->news = $news;
    }

    public function news(Request $request)
    {
        return $this->news->news($request);
    }
}
