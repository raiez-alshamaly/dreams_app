<?php

namespace App\Livewire\Dreams;

use App\Models\DreamStep;
use App\Models\StepMedia;
use Livewire\Attributes\On;
use Livewire\Component;

class DreamTimeLine extends Component
{
    public $dream;
    public $steps ;
    public $medias ;
    public function mount(){
        $this->steps = DreamStep::where('dream_id' , $this->dream)->with('media')->get();
     
    }
    #[On('dream-step-changed')]
    public function stepsUpdated(){
        $this->steps = DreamStep::where('dream_id' , $this->dream)->get();
        $this->render();
    }
    public function render()
    {
        return view('livewire.dreams.dream-time-line');
    }
}
