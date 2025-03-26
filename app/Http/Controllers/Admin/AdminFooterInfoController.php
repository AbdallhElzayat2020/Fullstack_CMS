<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AdminFooterInfoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class AdminFooterInfoController extends Controller
{
    public $footerInfo;

    public function __construct(AdminFooterInfoRepositoryInterface $footerInfo)
    {
        $this->footerInfo = $footerInfo;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('footer show', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('footer create', 'admin'), only: ['store']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->footerInfo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->footerInfo->store($request);
    }

}
