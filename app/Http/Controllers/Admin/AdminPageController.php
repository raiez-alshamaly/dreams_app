<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{

    public function dashboard()
    {
        return view("admin.index");
    }

    public function dreams()
    {
        return view("admin.dreams");
    }
    public function themes()
    {
        return view("admin.themes");
    }
    public function loader()
    {
        return view("admin.loader");
    }
}
