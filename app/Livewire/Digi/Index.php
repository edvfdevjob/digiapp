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
    public $elementsOnPage = 0;
    
    public function mount(){
        $this->getData();
        // $this->loading = false;
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
        $nextGroup = Http::get($this->endpoint . '?pageSize='.$this->quantity.'&page='.($this->totalPages + 1))->json();
        $this->elementsOnPage = $nextGroup['pageable']['elementsOnPage'];
    }

     public function updated($value){
        if($value=='quantity'){
            $this->reset( 'digimons', 'currentPage', 'nextPage', 'previousPage', 'totalPages', 'elementsOnPage');
            $this->getData();
        }
    }

    public function render()
    {
        $this->reset('digiData', 'modal');
        $this->getData();
        return view('livewire.digi.index');
    }

    public function openModal($id)
    {
        $this->modal = true;
        $this->digiData = Http::get($this->endpoint.'/'.$id)->json();
    }

    public function closeModal()
    {
        $this->reset('digiData', 'modal');
    }

    public function setPage($page)
    {
        $this->quantity = $this->quantity;
        $this->page = $page;
        $this->getData();
    }
}
