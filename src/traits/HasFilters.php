<?php

namespace Jpmerlotti\PaginatedPanel\traits;

trait HasFilters
{
    protected array $filters = [];

    public function setFilter(string $key, string $value): void
    {
        $this->filters[$key] = $value;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }
}
