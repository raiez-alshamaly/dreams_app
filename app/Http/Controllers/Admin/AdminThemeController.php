<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mekad\LaravelThemeCustomizer\Models\Theme;

class AdminThemeController extends Controller
{
    public function index(){
        return view("admin.themes");
    }

    public function show($id){
        $theme = Theme::find($id);
        if($theme == null){abort(404);}

        return view("admin.themes.show" , ['theme' => $theme]);
    }

    public function update(Request $request){
        return "update theme";
    }

    public function create(){
        return view("admin.themes.create");
    }
}
