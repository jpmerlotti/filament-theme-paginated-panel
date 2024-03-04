
<div class="mt-8 flow-root space-y-3">
    <div class="flex items-center">
        <i class="fas fa-search"></i><input type="text" wire:model="search">
    </div>
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr>
                        @foreach($this->columns() as $column)
                            <th scope="col">
                                <div class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    {{ $column->label }}
                                    @if($direction == 'desc')
                                        <i class="fa-solid fa-chevron-down"></i>
                                    @else
                                        <i class="fa-solid fa-chevron-up"></i>
                                    @endif
                                </div>
                            </th>
                        @endforeach
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($data['data'] as $row)
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
        </div>
    </div>
    <div class="flex justify-between items-center" x-data="{ current_page: {{ $data['current_page'] }} }">
        <span class="mr-4">Page {{ $data['current_page'] }} of {{ $data['last_page'] }}</span>
        <div class="flex justify-center items-center border border-gray-300 rounded-md">
{{--            <button type="button" class="fas fa-angle-left px-4 py-2 cursor-pointer hover:text-blue-500"--}}
{{--                    :class=" { 'cursor-not-allowed': {{ $data['current_page'] }} === 1 }"--}}
{{--                    wire:click="previousPage({{ $selectedPage }})"></button>--}}
            @foreach(range(1, $data['last_page']) as $page_number)
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
