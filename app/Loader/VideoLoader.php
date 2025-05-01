<?php 

namespace App\Loader;

use App\Loader\Spinners\Spinner;


class VideoLoader extends Loader {

    protected $path ;
    
    public function __construct($path){
        $this->path = $path;
    }
    public function getPath() {
        return $this->path;
    }

    public function setPath( $path){
        $this->path = $path;
        return $this;
    }
    public function render():string{

        $path = asset('storage/' . $this->getPath());
       return <<<HTML
             <video src='$path' alt="لودر" class="mx-auto mb-4 h-5/6 w-5/6"  autoplay> </video>
       HTML;
       
        
    }

    
}
