<?php 

namespace App\Loader;

use App\Loader\Spinners\Spinner;


class ImageLoader extends Loader {

    protected $imagePath ;
    
    public function __construct($imagePath){
        $this->imagePath = $imagePath;
    }
    public function getImagePath() {
        return $this->imagePath;
    }

    public function setImagePath( $imagePath){
        $this->imagePath = $imagePath;
        return $this;
    }
    public function render():string{
        
        $path = asset('storage/' . $this->getImagePath());
       return <<<HTML
             <img src='$path' alt="لودر" class="mx-auto mb-4 h-5/6 w-5/6">
       HTML;
       
        
    }

    
}
