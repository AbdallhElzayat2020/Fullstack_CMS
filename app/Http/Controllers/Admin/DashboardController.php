<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Models\SocialCount;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $publishedNews = News::where(['status' => 'active', 'is_approved' => 1])->count();
        $pendingNews = News::where(['status' => 'active', 'is_approved' => 0])->count();
        $totalCategories = Category::where(['status' => 'active'])->count();
        $totalLanguages = Language::count();
        $authenticatedUsers = User::count();
        $roles = Role::count();
        $permissions = Permission::count();
        $socialLinks = SocialCount::count();
        $totalSubscribers = Subscriber::count();

        return view('dashboard.index', compact(
            'publishedNews',
            'totalLanguages',
            'authenticatedUsers',
            'pendingNews',
            'totalCategories',
            'roles',
            'permissions',
            'socialLinks',
            'totalSubscribers',
        ));
    }


}
