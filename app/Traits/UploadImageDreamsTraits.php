<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImageDreamsTraits
{
   
    public function uploadImageDreams(Request $request, $key)
    {

        try {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                if ($file->isValid()) {
                    $path = $file->store('uploads/imgs/dreams' , 'public' );
                    return ['path' => $path];
                }
                return ['error' => 'Invalid file upload'];
            }
            return ['error' => 'No file uploaded'];
        } catch (\Throwable $th) {
            return ['error' => $th->getMessage()];
           
        }
    }
}
