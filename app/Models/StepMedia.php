<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StepMedia extends Model
{
    protected $fillable = [
        'step_id',
        'path'
    ];



    public function getType(): string
    {
       
        // Extract the file extension
    $extension = strtolower(pathinfo($this->path, PATHINFO_EXTENSION));

        // $extension = strtolower(pathinfo($this->Path, PATHINFO_EXTENSION));
     
        // Define arrays for image and video extensions
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
        $videoExtensions = ['mp4', 'avi', 'mov', 'mkv', 'flv', 'wmv'];
      
        // Check if the extension matches an image or video
        if (in_array($extension, $imageExtensions)) {
            return 'image';
        } elseif (in_array($extension, $videoExtensions)) {
            return 'video';
        } else {
            return 'unknown';
        }
    }

    public function step() : BelongsTo {
        return $this->belongsTo(DreamStep::class );
    }
}
