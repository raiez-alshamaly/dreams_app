<?php 

namespace App\Loader;

use App\Loader\Spinners\Spinner;


class EmptyLoader extends Loader {

    protected Spinner $spinner;
    
    public function __construct(Spinner $spinner){
        $this->spinner = $spinner;
    }
    public function getSpinner(): ?Spinner {
        return $this->spinner;
    }

    public function setSpinner(Spinner $spinner){
        $this->spinner = $spinner;
        return $this;
    }
    public function render():string{

        if($this->spinner != null){
            return $this->spinner->render();
        }else{
            return " " ;
        }
        
    }

    
}
