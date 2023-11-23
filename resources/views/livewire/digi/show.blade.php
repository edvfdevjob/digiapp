<div>
        <x-dialog-modal wire:model="modal">
            <x-slot name="title">
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
</div>
