<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class DashboardController extends Controller
{


//    public static function middleware(): array
//    {
//        return [
//            new Middleware(PermissionMiddleware::using('dashboard show', 'admin'), only: ['index']),
//        ];
//    }
    public function index()
    {
        return view('dashboard.index');
    }


}
