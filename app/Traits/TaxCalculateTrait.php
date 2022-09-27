<?php

namespace App\Traits;

trait TaxCalculateTrait
{
    public function taxCalculate($subTotal, $taxRate)
    {
        $taxPrice = $subTotal * $taxRate;
        $grandTotal = $subTotal + $taxPrice;
        return [$taxPrice, $grandTotal];
    }
}
