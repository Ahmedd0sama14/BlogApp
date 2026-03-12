<?php

namespace App\Http\Controllers;


class ThemController extends Controller
{
    public function index()
    {
        return view('Themes.index');
    }
}
