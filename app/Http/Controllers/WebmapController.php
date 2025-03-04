<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebmapController extends Controller
{
    /**
     * Display the webmap page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('webmap.index');
    }
}

