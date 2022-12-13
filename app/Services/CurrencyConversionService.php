<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

class CurrencyConversionService
{
    public function __construct(private CurrencyRepository $currencyRepository)
    {
    }

    public function getConvertedAmount(string $sourceCurrency, string $destinationCurrency, float $amount): float
    {
        $sourceAmountInDollars = $amount * $this->getDollarConversionRate($sourceCurrency);
        $converted = $sourceAmountInDollars / $this->getDollarConversionRate($destinationCurrency);
        return round($converted, 2);
    }

    private function getDollarConversionRate(string $isoCOde): float
    {
        return $this->currencyRepository->getDollarConversionRate($isoCOde);
    }
}
