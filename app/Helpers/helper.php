<?php

namespace App\Helpers;

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Str;

/* Format Tags */
function formatTags(array $tags): string
{
    return implode(',', $tags);
}

/* get selected language from session */

function getLanguage()
{
    try {
        if (session()->has('language')) {
            return session('language');
        }

        $language = Language::where('default', 'yes')->first();
        //use function
        setLanguage($language->lang);

        return $language->lang;
    } catch (\Exception $exception) {
        setLanguage('en');
    }
}

/* set language code in session */
function setLanguage(string $lang): void
{
    session()->put('language', $lang);
}

/* Limiting & truncate Text function  */

/* truncate Text */
function truncate(string $text, $limit, $ending): string
{
    return Str::limit($text, $limit, $ending);
}

/* Format Views */
function formatViews(int $number): int|string
{
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    }

    if ($number >= 1000) {
        return round($number / 1000, 1) . 'K';
    }
    return $number;
}

/* Make sidebar active */

function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }
    return '';
}

function getSetting($key)
{
    return Setting::where('key', $key)->first()->value;
}

function hasPermission(array $permissions)
{
    return auth()->guard('admin')->user()->hasAnyPermission($permissions);
}

/* check is it SuperAdmin */

