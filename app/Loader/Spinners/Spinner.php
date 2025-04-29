<?php 

namespace App\Loader\Spinners;

abstract class Spinner  {
    protected $color;
    protected $svg ;
    public function __construct($color = "0000ff", $svg = null){
       
        
        $this->color = $color ;
        $this->svg = $svg;
    }

    public function setColor($color){
        $this->color = $color;
        return $this;
    }

    public function setSVG($svg){
        $this->svg = $svg;
        return $this;
    }

    public function getColor(){
        return $this->color;
    }
    public function getSvg(){
        return $this->svg;
    }

    public abstract function render():string;
}

