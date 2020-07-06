<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function controlPanel()
    {
        return view('control-panel.index');
    }
}
