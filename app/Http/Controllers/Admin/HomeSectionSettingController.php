<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminHomesectionSettingRequest;
use App\Interfaces\AdminHomeSectionRepositoryInterface;
use App\Models\HomeSectionSetting;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class HomeSectionSettingController extends Controller
{
    public $section;

    public function __construct(AdminHomeSectionRepositoryInterface $section)
    {
        $this->section = $section;
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('show home section setting', 'admin'), only: ['index']),
            new Middleware(PermissionMiddleware::using('update home section setting', 'admin'), only: ['update']),
        ];
    }

    public function index()
    {
        return $this->section->index();
    }

    public function update(AdminHomesectionSettingRequest $request): \Illuminate\Http\RedirectResponse
    {
        return $this->section->update($request);
    }
}
