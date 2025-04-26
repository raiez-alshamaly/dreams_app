<?php

namespace App\Livewire\Dreams;

use App\Models\DreamStep;
use App\Models\StepMedia;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDreamStep extends Component
{
    use WithFileUploads;
    public $id;
    public $description;
    public $media;


    public function mount() {}


    public function store()
    {
        $this->validate([
            'description' => 'required',
            'media.*' => 'nullable|mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm|max:10240', // max: size in KB (10MB here
        ]);

        try {
            $step  = new   DreamStep();
            $step->dream_id = $this->id;
            $step->description = $this->description;
            $step->save();




            if ($this->media) {
                foreach ($this->media as $item) {
                    $extension = $item->getClientOriginalExtension();
                    $file_name = $this->id . '_' . $step->id . '_' . time() . '.' . $extension;
                    $path = $item->storeAs('uploads/imgs/dreamsteps', $file_name, 'public');
                    $file =  new StepMedia();
                    $file->step_id = $step->id;
                    $file->path = $path;
                    $file->save();
                }
            }




            $this->reset(['description', 'media']); // Clear form after save
            $this->dispatch('dream-step-changed');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }



    public function render()
    {
        return view('livewire.dreams.create-dream-step');
    }
}
