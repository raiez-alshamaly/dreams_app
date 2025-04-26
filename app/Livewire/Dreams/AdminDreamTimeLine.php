<?php

namespace App\Livewire\Dreams;

use App\Models\DreamStep;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminDreamTimeLine extends Component
{
    public $dream;
    public $steps ;
    public $medias ;
    public function mount(){
        $this->steps = DreamStep::where('dream_id' , $this->dream)->with('media')->get();
     
    }

    public function delete($id) {
        $step = DreamStep::find($id);
        $step->delete();
        $this->dispatch('dream-step-changed');
    }
    public function edit($id){
       
        redirect()->route('admin.dreams.steps.edit', $id);
    }
    #[On('dream-step-changed')]
    public function stepsUpdated(){
        $this->steps = DreamStep::where('dream_id' , $this->dream)->get();
        $this->render();
    }
    public function render()
    {
        return view('livewire.dreams.admin-dream-time-line');
    }
}
