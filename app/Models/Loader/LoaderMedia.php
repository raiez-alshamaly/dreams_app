<?php

namespace App\Models\Loader;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoaderMedia extends Model
{
    use HasFactory;
    
    protected $table = 'loader_medias';
    protected $fillable = [
        'id',
        'loader_setting_id',
        'path',
        'created_at',
        'updated_at',
      
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
  
}
