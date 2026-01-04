<?php

namespace App\Traits;

trait HasTax
{
    public function calculate(int $basePrice, $taxRate = null): int
    {
        $taxRate ?:  config('app.vat_percentage')/100;
        return (int) round($basePrice * (1 + $taxRate));
    }
}
