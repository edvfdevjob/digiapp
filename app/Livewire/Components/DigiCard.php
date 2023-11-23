<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DigiCard extends Component
{
    public $digimon;

    public function openModal($id)
    {
        $this->dispatch('openModal', $id);
    }

    public function render()
    {
        return view('livewire.components.digi-card');
    }
}
