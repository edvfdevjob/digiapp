<div>
    <ul class="inline-flex -space-x-px text-base h-10">
        <li class="@if($currentPage <= 0) hidden @endif">
            <button wire:click="setPage({{ $previousPage }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-black bg-red-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-red-100 hover:text-gray-700 dark:bg-red-600 dark:border-gray-700 dark:text-white dark:hover:bg-red-300 dark:hover:text-black">Anterior</button>
        </li>
        <li class="@if($currentPage <= 0) hidden @endif">
            <button wire:click="setPage({{ $previousPage }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-black bg-red-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-red-100 hover:text-gray-700 dark:bg-red-600 dark:border-gray-700 dark:text-white dark:hover:bg-red-300 dark:hover:text-black">{{ (intval($previousPage) + 1) }}</button>
        </li>
        <li>
            <button wire:click="setPage({{ $currentPage }})" aria-current="page" class="flex items-center justify-center px-4 h-10 text-black border border-gray-300 bg-blue-50  hover:text-white-700 dark:border-gray-700 dark:bg-red-300 dark:hover:text-black dark:text-white">{{ $currentPage + 1 }}</button>
        </li>
        <li class="@if($currentPage > $totalPages) hidden @endif">
            <button wire:click="setPage({{ $nextPage }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-black bg-red-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-red-100 hover:text-gray-700 dark:bg-red-600 dark:border-gray-700 dark:text-white dark:hover:bg-red-300 dark:hover:text-black">{{ (intval($currentPage) + 2) }}</button>
        </li>
        <li class="@if($currentPage > $totalPages) hidden @endif">
            <button wire:click="setPage({{ $nextPage }})" class="flex items-center justify-center px-4 h-10 leading-tight text-black bg-red-100 border border-gray-300 rounded-e-lg hover:bg-red-100 hover:text-gray-700 dark:bg-red-600 dark:border-gray-700 dark:text-white dark:hover:bg-red-300 dark:hover:text-black">Siguiente</button>
        </li>
    </ul>

    <ul class="inline-flex mt-3 -space-x-px text-base h-10">
        <li>
            <button wire:click="setPage({{ 0 }})" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-black bg-red-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-red-100 hover:text-gray-700 dark:bg-red-600 dark:border-gray-700 dark:text-white dark:hover:bg-red-300 dark:hover:text-black">Inicio</button>
        </li>
        <li>
            <button wire:click="setPage({{ $totalPages + 1 }})" class="flex items-center justify-center px-4 h-10 leading-tight text-black bg-red-100 border border-gray-300 rounded-e-lg hover:bg-red-100 hover:text-gray-700 dark:bg-red-600 dark:border-gray-700 dark:text-white dark:hover:bg-red-300 dark:hover:text-black">Final</button>
        </li>
    </ul>
</div>
