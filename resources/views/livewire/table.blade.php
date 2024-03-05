
<div class="mt-8 flow-root space-y-3">
    <div class="flex items-center">
        <x-heroixon-o-magnifying-glass /><input type="text" wire:model="search" placeholder="Search">
    </div>
    <div class="mt-8 flow-root space-y-3">
        <table class="w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5 dark:text-white/5 dark:bg-none">
            <thead class="bg-gray-50">
            <tr>
                @foreach($this->columns() as $column)
                    <th scope="col">
                        <button class="flex items-center space-x-1 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                wire:click="sortBy({{ $column->key }})">
                                    <span>
                                        {{ $column->label }}
                                    </span>
                            <span>
                                        @if($direction == 'desc')
                                    <button wire:click="sortBy({{ $column->key }}, 'asc')">
                                                <x-heroicon-o-chevron-down class="w-3 h-3 group-hover:opacity-0" />
                                            </button>
                                @else
                                    <button wire:click="sortBy({{ $column->key }}, 'desc')">
                                                <x-heroicon-o-chevron-up class="w-3 h-3 group-hover:opacity-0" />
                                            </button>
                                @endif
                                    </span>
                        </button>
                    </th>
                @endforeach
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($this->data as $row)
                <tr class="bg-white border-b hover:bg-gray-50">
                    @foreach($this->columns() as $column)
                        <td>
                            <div class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                <x-dynamic-component
                                    :component="$column->component"
                                    :value="$row[$column->key]"
                                >
                                </x-dynamic-component>
                            </div>
                        </td>
                    @endforeach
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-between items-center" x-data="{ current_page: {{ $pagination['current_page'] }} }">
        <span class="mr-4">Page {{ $pagination['current_page'] }} of {{ $pagination['total_pages'] }}</span>
        <div class="flex justify-center items-center border border-gray-300 rounded-md">
            {{--            <button type="button" class="fas fa-angle-left px-4 py-2 cursor-pointer hover:text-blue-500"--}}
            {{--                    :class=" { 'cursor-not-allowed': {{ $data['current_page'] }} === 1 }"--}}
            {{--                    wire:click="previousPage({{ $selectedPage }})"></button>--}}
            @foreach(range(1, $pagination['total_pages']) as $page_number)
                <button type="button" class="px-4 py-2 border-x cursor-pointer hover:text-blue-500"
                        :class="{ 'text-blue-500': {{ $page_number }} === {{ $selectedPage }} }"
                        wire:click="paginate({{ $page_number }})">
                    {{ $page_number }}
                </button>
            @endforeach
            {{--            <button type="button" class="fas fa-angle-right px-4 py-2 cursor-pointer hover:text-blue-500"--}}
            {{--                    :class=" { 'cursor-not-allowed': {{ $data['current_page'] }} === {{ $data['last_page'] }} }"--}}
            {{--                    wire:click="nextPage({{ $selectedPage }})"></button>--}}
        </div>
    </div>
</div>
