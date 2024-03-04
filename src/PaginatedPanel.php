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
    private string $direction = 'desc';
    public int $selectedPage = 1;

    public abstract function api(int $page = 1, array $filters = [], string $sortBy = 'id', string $direction = 'desc'): array;

    public abstract function columns(): array;
    public function data()
    {
        return $this->api()['data'];
    }

    public function mount(): void
    {
        $this->paginate();
    }
    public function paginate(int $page = 1, array $filters = [], string $orderBy = 'id', string $direction = 'desc'): void
    {
        $this->selectedPage = $page;
        $this->data = $this->api($page, $filters, $orderBy, $direction);
        $this->resetPage('page');
    }

    public function nextPage(int $page): void
    {
        $this->selectedPage = $page + 1;
        $this->data = $this->api($this->selectedPage);
        $this->resetPage('page');
    }
    public function previousPage(int $page): void
    {
        $this->selectedPage = $page - 1;
        $this->data = $this->api($this->selectedPage);
        $this->resetPage('page');
    }
    public function render()
    {
        return view('PaginatedPanel::livewire.table');
    }
}
