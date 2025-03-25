<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminAboutRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class AboutController extends Controller implements HasMiddleware
{

    public $about;

    public function __construct(AdminAboutRepositoryInterface $about)
    {
        $this->about = $about;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('show about page', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('update about page', 'admin'), only: ['update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->about->index();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->about->update($request);
    }


}
