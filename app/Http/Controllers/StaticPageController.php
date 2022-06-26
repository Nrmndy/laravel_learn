<?php

namespace App\Http\Controllers;

class StaticPageController extends Controller
{
    public function about()
    {
        return view('static.about');
    }

    public function contacts()
    {
        return view('static.contacts');
    }
}
