<?php

namespace Jpmerlotti\PaginatedPanel;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

abstract class PaginatedPanel extends Component
{
//    public abstract function query(): Builder;
    use withPagination;

    public array $data = [];
    public int $selectedPage = 1;

    public abstract function api(): array;

    public abstract function columns(): array;
    public function data()
    {
        return $this->api()['data'];
    }

    public function mount(): void
    {
        $this->paginate();
    }
    public function paginate(int $page = 1): void
    {
        $this->selectedPage = $page;
        $this->data = $this->api($page);
        $this->resetPage('page');
    }

    public function nextPage(int $page): void
    {
        $this->selectedPage = $page + 1;
        $this->data = $this->api($page + 1);
        $this->resetPage('page');
    }
    public function previousPage(int $page): void
    {
        $this->selectedPage = $page - 1;
        $this->data = $this->api($page - 1);
        $this->resetPage('page');
    }

    public function render()
    {
        return view('PaginatedPanel::livewire.table');
    }
}
