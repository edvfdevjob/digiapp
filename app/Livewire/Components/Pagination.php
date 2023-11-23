<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Pagination extends Component
{
    public $currentPage;
    public $nextPage;
    public $previousPage;
    public $totalPages;

    public function setPage($page)
    {
        $this->dispatch('setPage', $page);
    }

    public function render()
    {
        return view('livewire.components.pagination');
    }
}
