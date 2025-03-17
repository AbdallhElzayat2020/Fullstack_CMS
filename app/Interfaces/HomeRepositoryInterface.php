<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface HomeRepositoryInterface
{
    public function index();

    public function ShowNews(string $slug);

    public function countView($news);

    public function mostTags();

    public function handleComment(Request $request);

    public function handleReplay(Request $request);

    public function commentDestroy(Request $request);

    public function newsLetter(Request $request);

    public function about();

    public function contact();

    public function handleContactForm($request);




}
