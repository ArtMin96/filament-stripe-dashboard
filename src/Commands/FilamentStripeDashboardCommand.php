<?php

namespace ArtMin96\FilamentStripeDashboard\Commands;

use Illuminate\Console\Command;

class FilamentStripeDashboardCommand extends Command
{
    public $signature = 'filament-stripe-dashboard';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
