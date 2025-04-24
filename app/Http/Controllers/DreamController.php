<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDreamRequest;
use App\Http\Requests\UpdateDreamRequest;
use App\Models\Dream;
use App\Traits\UploadImageDreamsTraits;
use Exception;
use Illuminate\Support\Facades\DB;

class DreamController extends Controller
{
    use UploadImageDreamsTraits;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('dreams.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('dreams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDreamRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        try {


            $saved_image  = [];
            $image = $this->uploadImageDreams($request, "image_path");
            if (isset($image['error'])) {
                throw new Exception($image['error']);
            } else {
                $saved_image[] = $image;
                $id_image =  $this->uploadImageDreams($request, 'id_image_path');
                if (isset($id_image['error'])) {
                    $saved_image[] = $id_image;
                    throw new Exception($id_image['error']);

                   
                } else {
                    $saved_image[] = $id_image;
                    $dream = new Dream([
                        'full_name'     => $validated['full_name'],
                        'description'   => $validated['description'],
                        'amount'        => $validated['amount'],
                        'phone'         => $validated['phone'],
                        'image_path'    => $image['path'],
                        'id_image_path' => $id_image['path']
                    ]);
                    $dream->saveOrFail(); // Throws exception if save fails
                    DB::commit();
                    session()->flash('message', 'Dream created successfully');
                   
                }
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            // Clean up any uploaded files if needed

            foreach ($saved_image as $image) {
                if (isset($image['path']) && file_exists($image['path'])) {
                    unlink($image['path']);
                }
            }
            session()->flash('error', 'Error: ' . $e->getMessage());
            dd($e->getMessage());
        }
        
        return redirect()->route('dreams.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dream $dream)
    {
    
        return view('dreams.show' , ['dream' => $dream]);
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
