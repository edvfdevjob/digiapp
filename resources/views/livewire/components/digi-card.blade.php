<div>
    <div class="bg-white max-w-sm rounded border-2 border-red-800 hover:border-orange-200 overflow-hidden shadow-lg m-auto p-4 card-dig">
        <img wire:click="openModal({{ $digimon['id'] }})" class="hover:brightness-75 w-full card-img cursor-pointer rounded border-2 border-red-200" src="{{ $digimon['image'] }}" alt="{{ $digimon['name'] }}">
        <div class=" py-4 text-center">
            <b>{{ $digimon['id'] }}</b>
            <div wire:click="openModal({{ $digimon['id'] }})" class="underline decoration-solid font-bold cursor-pointer text-xl mb-2 text-center sm:text-base text-blue-700">{{ $digimon['name'] }}</div>
        </div>
    </div>
</div>
