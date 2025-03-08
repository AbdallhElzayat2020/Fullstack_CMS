<?php

namespace App\Helpers;

use App\Models\Language;

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
        } else {
            $language = Language::where('default', 'yes')->first();
            //use function
            setLanguage($language->lang);

            return $language->lang;
        }
    } catch (\Exception $exception) {
        setLanguage('en');
    }
}

/* set language code in session */
function setLanguage(string $lang): void
{
    session()->put('language', $lang);
}
