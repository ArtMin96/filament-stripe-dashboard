<?php

namespace ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource\Widgets;

use Akaunting\Money\Money;
use ArtMin96\FilamentStripeDashboard\StripeClient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Str;

class AvailableBalance extends BaseWidget
{
    protected $balance;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->balance = (new StripeClient)->getBalance();
    }

    protected function getCards(): array
    {
        return [
            Card::make('Available balance', $this->availableBalance()),
            Card::make('Pending balance', $this->pendingBalance())
        ];
    }

    protected function availableBalance()
    {
        $currency = Str::upper(optional($this->balance->available[0])->currency);
        $balance = optional($this->balance->available[0])->amount;

        return Money::$currency($balance);
    }

    protected function pendingBalance()
    {
        $currency = Str::upper(optional($this->balance->pending[0])->currency);
        $balance = optional($this->balance->pending[0])->amount;

        return Money::$currency($balance);
    }
}
