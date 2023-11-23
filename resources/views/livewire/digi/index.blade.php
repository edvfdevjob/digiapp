<div>
    <div class="container-fluid rounded">
        <div class="grid sm:grid-cols-1.md:grid-cols-3">
            <h2 class="text-center  text-xl font-semibold py-3 text-main">Listado de <span class="text-red-700 uppercase">Digimons</span></h2>     
        </div>
        
        <div class="row">
            
            <!-- Card Digimons -->
            <h2 wire:loading="digimons" class="text-center font-bold w-full">Cargando...</h2>
            <div wire:loading.remove="digimons" class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            @if (count($digimons) > 0)
                @foreach ($digimons as $digimon)
                <livewire:components.digi-card :wire:key="$digimon['id']" :digimon="$digimon"></livewire:components.digi-card>
                @endforeach
            @endif
            
            </div>
        </div>

        <br>

        <!-- Pagination -->
        <nav aria-label="Page navigation example" class="sm:inline:block" style="text-align: center" wire:loading.remove="digimons">
            <livewire:components.pagination :wire:key="$currentPage.$nextPage.$previousPage.$totalPages" :currentPage="$currentPage" :nextPage="$nextPage" :previousPage="$previousPage" :totalPages="$totalPages"></livewire:components.pagination>
        </nav>
        @if ($digiData)
            <livewire:digi.show :modal="$modal" :digiData="$digiData"></livewire:digi.show>
        @endif
            
    </div>
    
</div>
