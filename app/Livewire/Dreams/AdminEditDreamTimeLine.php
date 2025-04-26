<?php

namespace App\Livewire\Dreams;

use App\Models\DreamStep;
use App\Models\StepMedia;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditDreamTimeLine extends Component
{
    use WithFileUploads;
    public $id;
    public $description;
    public $media;
    public $saved_media;
    public $step;

    public function mount()
    {
        $this->step  =  DreamStep::where('id', $this->id)->with('media')->first();

        $this->description = $this->step->description;
        $this->saved_media = $this->step->media ?? [];
    }
    public function update()
    {
        $this->validate([
            'description' => 'required',
            'media.*' => 'nullable|mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm|max:10240', // max: size in KB (10MB here
        ]);
        try {


            $this->step->description = $this->description;
            $this->step->save();




            if ($this->media) {
                foreach ($this->media as $item) {
                    $extension = $item->getClientOriginalExtension();
                    $file_name = $this->id . '_' . $this->step->id . '_' . time() . '.' . $extension;
                    $path = $item->storeAs('uploads/imgs/dreamsteps', $file_name, 'public');
                    $file =  new StepMedia();
                    $file->step_id = $this->step->id;
                    $file->path = $path;
                    $file->save();
                }
            }




            $this->mount();
            $this->render();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function deleteMedia($id)
    {
        $media = StepMedia::find($id);
        if ($media) {
            if (Storage::disk('public')->exists($media->path)) {
                Storage::disk('public')->delete($media->path);
            }
            $media->delete();

            $this->mount();
            $this->render();
        }
    }

    public function render()
    {
        return view('livewire.dreams.admin-edit-dream-time-line');
    }
}
