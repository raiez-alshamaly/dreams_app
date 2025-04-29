<?php

namespace App\Http\Controllers\Loader;

use App\Http\Controllers\Controller;
use App\Models\Loader\LoaderText;
use Illuminate\Http\Request;

class LoaderTextController extends Controller
{
    public function create() {
        return view("admin.loader.texts.create");
    }
    public function show($id)
    {
        $text = LoaderText::findOrFail($id);
        return view('admin.loader.texts.edit' , [
            'id' => $text->id,
            'text' => $text->text,
            'is_active' => $text->is_active
        ]);
    }

    public function store(Request $request)
    {
       
         $request->validate([
            'text' => 'required|string',
           
        ]);
      
        $text = new LoaderText();
        $text->text = $request['text'];
        $text->is_active = $request['is_active'] ? 1 : 0;
        $text->save();
       
        return redirect()->route('admin.loader.index');
    }

    public function update(Request $request, $id)
    {
        $text = LoaderText::findOrFail($id);

        $data = $request->validate([
            'text' => 'required|string',
           
        ]);

        $text->text = $request['text'];
        $text->is_active = $request['is_active'] ?  1 :  0;
        $text->save();

        return redirect()->route('admin.loader.index');
    }

   
}
