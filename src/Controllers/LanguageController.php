<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{

    /**
     * Set the language for the app.
     *
     * @param string $lang (en/es)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index($lang)
    {
        //Set the selected language for the whole app and the cookie
        App::setLocale($lang);
        Cookie::queue('locale', $lang);

        return back();
    }
}
