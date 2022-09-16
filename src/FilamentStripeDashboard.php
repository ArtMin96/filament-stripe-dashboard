<?php

namespace ArtMin96\FilamentStripeDashboard;

use Akaunting\Money\Money;

class FilamentStripeDashboard
{
    public static function formatMoney($currencyCode, $amount): string
    {
        return Money::$currencyCode($amount);
    }
}
