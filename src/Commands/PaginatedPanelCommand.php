<?php

namespace Jpmerlotti\PaginatedPanel\Commands;

use Illuminate\Console\Command;

class PaginatedPanelCommand extends Command
{
    public $signature = 'filament-theme-paginated-panel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
