<?php

namespace App\Http\Controllers\Page404;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Page404Controller extends Controller
{
    // create function index
    public function index()
    {
        return view('errors.page404.index');
    }
}
