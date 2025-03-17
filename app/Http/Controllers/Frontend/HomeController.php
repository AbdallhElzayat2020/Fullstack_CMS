<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\HomeRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public HomeRepositoryInterface $news;

    public function __construct(HomeRepositoryInterface $news)
    {
        $this->news = $news;
    }

    public function index()
    {
        return $this->news->index();
    }

    public function ShowNews(string $slug)
    {
        return $this->news->ShowNews($slug);
    }

    // handle  count of views

    public function countView($news)
    {
        return $this->news->countView($news);
    }

    public function mostTags(): \Illuminate\Support\Collection
    {
        return $this->news->mostTags();
    }

    public function handleComment(Request $request): \Illuminate\Http\RedirectResponse
    {
        return $this->news->handleComment($request);
    }

    public function handleReplay(Request $request): \Illuminate\Http\RedirectResponse
    {
        return $this->news->handleReplay($request);
    }

    public function commentDestroy(Request $request)
    {
        return $this->news->commentDestroy($request);
    }

    public function newsLetter(Request $request)
    {
        return $this->news->newsLetter($request);
    }

    public function about()
    {
        return $this->news->about();
    }

    public function contact()
    {
        return $this->news->contact();
    }

    public function handleContactForm(Request $request)
    {
        return $this->news->handleContactForm($request);
    }
}
