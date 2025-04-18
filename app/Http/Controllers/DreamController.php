<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDreamRequest;
use App\Http\Requests\UpdateDreamRequest;
use App\Models\Dream;

class DreamController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dreams.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  "VIEW CRETE NEW DARME PAGE";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDreamRequest $request)
    {
        $request->validated();
        $full_name = $request['full_name'] ;
        $description = $request['description'] ;
        $amount = $request['amount'] ;
        $image_path = $request['image_path'] ;

        $dream = new Dream();
        $dream->full_name = $full_name;
        $dream->description = $description;
        $dream->amount = $amount;
        $dream->image_path = $image_path;
        if($dream->save()){
            session()->flash('message', 'Dream created successfully');
            // redirect()->back();
        }else{
            session()->flash('error', 'Error creating dream');
            // redirect()->back();
        }


        return "STORE NEW DRAME AND THEN RETURN RESULT TO CREATE PAGE OR USER";
    }

    /**
     * Display the specified resource.
     */
    public function show(Dream $dream)
    {
        return "VIEW WITH DREAM INFORMATION";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dream $dream)
    {
        return "VIEW TO EDIT DREAM PAGE ";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDreamRequest $request, Dream $dream)
    {
        return "UPDATE DREAM THEN REDIRECT TI USER";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dream $dream)
    {
        return "DELETE DREAM THEN RETURN TO USER";
    }
}
