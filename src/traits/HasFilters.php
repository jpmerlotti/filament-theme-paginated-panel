<?php

namespace Jpmerlotti\PaginatedPanel\traits;

trait HasFilters
{
    protected array $filters = [];

    public function setFilter(string $key, string $value): void
    {
        $this->filters[$key] = $value;
    }

    public function setSorteringFilter(string $value): void
    {
        $this->filters['sort'] = $value;
    }

    public function setDirectionFilter(string $value): void
    {
        $this->filters['direction'] = $value;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getFilterByKey(string $key): string
    {
        return $this->filters[$key] ?? "This key is not setted";
    }
}
