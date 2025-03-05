<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (in_array($locale, config('app.available_locales'))) {
            Session::put('locale', $locale);
            app()->setLocale($locale);
            App::setLocale($locale);
        }
        return redirect()->back();
    }

    public function modeSwitch($locale)
    {
        Session::put('mode', $locale);
        return redirect()->back();
    }
}
