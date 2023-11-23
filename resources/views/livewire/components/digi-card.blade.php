<div>
    <div class="bg-white hover:animate-pulse max-w-sm rounded border-2 border-orange-200 overflow-hidden shadow m-auto p-4 card-dig">
        <img wire:click="openModal({{ $digimon['id'] }})" class="w-full card-img cursor-pointer rounded" src="{{ $digimon['image'] }}" alt="{{ $digimon['name'] }}">
        <div class=" py-4 text-center">
            <b>#{{ $digimon['id'] }}</b>
            <div wire:click="openModal({{ $digimon['id'] }})" class=" font-bold cursor-pointer text-xl mb-2 text-center sm:text-base text-black-700">{{ $digimon['name'] }}</div>
        </div>
    </div>
</div>
