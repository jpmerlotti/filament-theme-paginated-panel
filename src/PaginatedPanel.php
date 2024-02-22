<?php

namespace Jpmerlotti\PaginatedPanel;

use Jpmerlotti\PaginatedPanel\Columns\TextColumn;
use Jpmerlotti\PaginatedPanel\Columns\NumberColumn;
use Livewire\Component;
use Livewire\WithPagination;

abstract class PaginatedPanel extends Component

{
//    public abstract function query(): Builder;
    use withPagination;
    public abstract function api(): array;

    public abstract function columns(): array;
    public function data()
    {
        return $this->api()['data'];
    }

    public function paginate(): array
    {
        return $this->api();
    }
//    public function pagination()
//    {
//        $current_page = $this->api()['current_page'];
//        $last_page = $this->api()['last_page'];
//        return ['current_page' => $current_page, 'last_page' => $last_page];
//    }
    public function render()
    {
        return view('livewire.table');
    }
}
