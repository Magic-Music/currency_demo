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
        $sourceAmountInDollars = $amount * $this->getDollarAmount($sourceCurrency);
        $converted = $sourceAmountInDollars / $this->getDollarAmount($destinationCurrency);
        return round($converted, 2);
    }

    private function getDollarAmount(string $isoCOde): float
    {
        return $this->currencyRepository->getDollarValue($isoCOde);
    }
}
