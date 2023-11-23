<?php

namespace App\Livewire\Digi;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Index extends Component
{
    private $data = [];
    private $endpoint = 'https://www.digi-api.com/api/v1/digimon';
    public $digimons = [];
    public $digiData = [];
    public $modal = false;
    public $quantity = 20;
    // Paginacion
    public $page = 0;
    public $currentPage = 0;
    public $nextPage = 1;
    public $previousPage;
    public $totalPages;

    protected $listeners = ['closeModal', 'setPage', 'openModal'];

    public function mount(){
        $this->getData();
    }

    public function getData()
    {
        $this->data = Http::get($this->endpoint . '?pageSize='.$this->quantity.'&page='.$this->page)->json();
        if(!isset($this->data['content'])){
            $this->digimons = [];
        }else{
            $this->digimons = $this->data['content'];
        }
        $this->currentPage = $this->data['pageable']['currentPage'];
        $this->nextPage = ($this->currentPage + 1);
        $this->previousPage = $this->data['pageable']['currentPage'] > 0 ? ($this->data['pageable']['currentPage'] - 1) : '';
        $this->totalPages = $this->data['pageable']['totalPages'];
    }

    public function render()
    {
        return view('livewire.digi.index');
;
    }

    public function openModal($id)
    {
        $this->modal = true;
        $this->digiData = Http::get($this->endpoint.'/'.$id)->json();
        
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->reset('digiData');
    }

    public function setPage($page)
    {
        $this->page = $page;
        $this->getData();
    }
}
