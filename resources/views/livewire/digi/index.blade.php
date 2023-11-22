<div>
    <div class="container-fluid">
        <div class="grid sm:grid-cols-1.md:grid-cols-3">
            <h2 class="text-center  text-xl font-semibold">Listado de Digimons</h2>
            <div class="block ml-auto">
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 ">Cantidad</label>
                <select wire:model.lazy="quantity" name="quantity" id="quantity" class="bg-white-50 border border-white-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 ">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="40">40</option>
                </select>
            </div>
            
        </div>
        
        <div class="row">
            
            <!-- Card Digimons -->
            
            <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-7 gap-4">
            @if (count($digimons) > 0)
                @foreach ($digimons as $digimon)
                <div class="max-w-sm rounded overflow-hidden shadow-lg m-auto">
                    <img wire:click="openModal({{ $digimon['id'] }})" class="w-full card-img cursor-pointer" src="{{ $digimon['image'] }}" alt="{{ $digimon['name'] }}">
                    <div class=" py-4 text-center">
                        <b>{{ $digimon['id'] }}</b>
                        <div wire:click="openModal({{ $digimon['id'] }})" class="underline decoration-solid font-bold cursor-pointer text-xl mb-2 text-center sm:text-base">{{ $digimon['name'] }}</div>
                    </div>
                </div>
                @endforeach
            @endif
            
            </div>
        </div>

        <br>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-base h-10">
                <li class="{{ $currentPage <= 0 ? 'hidden' : '' }}">
                    <button wire:click="setPage({{ $previousPage }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</button>
                </li>
                <li class="{{ $currentPage <= 0 ? 'hidden' : '' }}">
                    <button wire:click="setPage({{ $previousPage }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ (intval($previousPage) + 1) }}</button>
                </li>
                <li>
                    <button wire:click="setPage({{ $currentPage }})" aria-current="page" class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50  hover:text-white-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $currentPage + 1 }}</button>
                </li>
                <li class="{{ $currentPage > $totalPages ? 'hidden' : '' }}">
                    <button wire:click="setPage({{ $previousPage }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ (intval($currentPage) + 2) }}</button>
                </li>
                <li class="{{ $currentPage > $totalPages ? 'hidden' : '' }}">
                    <button wire:click="setPage({{ $nextPage }})" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Siguiente</button>
                </li>
            </ul>

            <ul class="inline-flex -space-x-px text-base h-10">
                <li >
                    <button wire:click="setPage({{ 0 }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Inicio</button>
                </li>
                <li>
                    <button wire:click="setPage({{ $elementsOnPage <= 0 ? $totalPages : ($totalPages + 1) }})" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Final</button>
                </li>
            </ul>
        </nav>
        @if($modal && $digiData != [])
        <x-dialog-modal wire:model="modal">
            <x-slot name="title">
                <!-- Detalles de: {{ $digiData['name'] }} -->
            </x-slot>
            <x-slot name="content">
                <div class="text-center">
                    <h6 class="font-semibold">{{ $digiData['id'] }}</h6>
                    <h3 class="text-xl font-semibold">{{ $digiData['name'] }}</h3>
                    <img class="mx-auto my-3 img-detail" src="{{ $digiData['images'][0]['href'] }}" alt="">
                </div>

                <div class="grid sm:grid-cols-3 gap-3">
                    <p class="text-center">
                        <b>Level</b><br>
                        @if (count($digiData['levels']) > 0)
                            {{ $digiData['levels'][0]['level'] ?? 'Unknown' }}
                        @else
                            Unknown
                        @endif
                    </p>
                    <p class="text-center">
                        <b>Attribute</b><br>
                        @if (count($digiData['attributes']) > 0)
                            {{ $digiData['attributes'][0]['attribute'] ?? 'Unknown' }}
                        @else
                            Unknown
                        @endif
                    </p>
                    <p class="text-center">
                        <b>Type</b><br>
                        @if (count($digiData['types']) > 0)
                            {{ $digiData['types'][0]['type'] ?? 'Unknown' }}
                        @else
                            Unknown
                        @endif
                    </p>
                </div>
                <br>
                @if (count($digiData['fields']) > 0)
                <div class="text-center">
                    <b class="text-center">Fields</b>
                    <div class="flex flex-wrap justify-center">
                        
                            @foreach ($digiData['fields'] as $imgField)
                            <div class="ms-2 text-center">
                            <b>{{ $imgField['field'] }}</b>
                            <img width="90" src="$imgField['image']" alt="">
                            </div>
                            
                            @endforeach
                        
                        
                    </div>
                </div>
                @endif
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button tabindex="-1" wire:click="closeModal">
                    Cerrar
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
        @endif
    </div>
    
</div>
