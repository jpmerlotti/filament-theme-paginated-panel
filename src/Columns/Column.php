<?php

namespace Jpmerlotti\PaginatedPanel\Columns;

abstract class Column
{
    public string $component = 'paginated-panel::columns.column';
    public string $key;
    public string $label;
    public function __construct($key)
    {
        $this->key = $key;
    }

    public static function make($key): static
    {
        return new static($key);
    }

    public function label($label): static
    {
        $this->label = $label;

        return $this;
    }

    public function component(string $component): static
    {
        $this->component = $component;

        return $this;
    }
}
