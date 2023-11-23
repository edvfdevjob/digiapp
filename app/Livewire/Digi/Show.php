<?php

namespace App\Livewire\Digi;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Show extends Component
{
    public $modal;
    public $digiData;

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.digi.show');
    }
}
