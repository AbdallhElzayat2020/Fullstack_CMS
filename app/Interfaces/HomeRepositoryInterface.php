<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface HomeRepositoryInterface
{
    public function index();

    public function ShowNews(string $slug);

    public function countView($news);
    public function mostTags(): \Illuminate\Support\Collection;
    public function handleComment(Request $request): \Illuminate\Http\RedirectResponse;
    public function handleReplay(Request $request): \Illuminate\Http\RedirectResponse;
    public function commentDestroy(Request $request);


}
