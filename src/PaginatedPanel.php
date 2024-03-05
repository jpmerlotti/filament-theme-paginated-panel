<?php

namespace Jpmerlotti\PaginatedPanel;

use Illuminate\View\View;
use Jpmerlotti\PaginatedPanel\traits\HasFilters;
use Livewire\Component;
use Livewire\WithPagination;

abstract class PaginatedPanel extends Component
{
    use HasFilters, WithPagination;

    public array $data = [];
    public array $pagination = [];
    public string $column = 'id';
    public string $direction = 'desc';
    public string $searchFor = '', $search = '';
    public int $selectedPage = 1;

    public abstract function api(int $page = 1, array $filters = [], string $sortBy = 'id', string $direction = 'desc'): array;

    public abstract function columns(): array;

    public function mount(): void
    {
        $this->sortBy();
        $this->paginate();
    }

    public function paginate(int $page = 1, array $filters = []): void
    {
        $this->selectedPage = $page;
        $response = $this->api($page, $filters, $this->column, $this->direction);
        $this->data = $response['data'];
        $this->pagination = $response['pagination'];
        $this->resetPage('page');
    }

    public function sortBy(string $column = 'id', string $direction = 'desc'): void
    {
        if ($column === $this->column) {
            $direction = $this->direction === 'desc' ? 'asc' : 'desc';
        }
        $this->column = $column;
        $this->direction = $direction;
        $this->selectedPage = 1;
        $this->paginate();
    }

    public function search(string $searchFor = '', string $searchBy = ''): void
    {
        if(isset($searchFor)) {
            $this->searchFor = $searchFor;
        }
        if(isset($searchBy)) {
            $this->searchBy = $searchBy;
        }
        $this->setFilter($this->searchFor, $this->searchBy);
        $this->paginate(1, $this->getFilterByKey($this->searchFor));
    }

    public function render()
    {
        return view('PaginatedPanel::livewire.table');
    }
}

