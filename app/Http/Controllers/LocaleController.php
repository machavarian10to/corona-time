<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function changeLocale(string $locale): RedirectResponse
    {
        if (in_array($locale, config('app.available_locales')))
        {
            session()->put('lang', $locale);
        }
        else
        {
            session()->put('lang', 'en');
        }
        return redirect()->back();
    }
}
