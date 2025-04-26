<?php

namespace App\Livewire\Dreams;

use App\Models\Dream;
use Livewire\Component;

class DreamInfoCard extends Component
{
    public Dream $dream ;
    public function render()
    {
        return view('livewire.dreams.dream-info-card');
    }
}
