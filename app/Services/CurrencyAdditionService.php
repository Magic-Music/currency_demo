<?php

namespace App\Services;

use App\Resources\CurrencyResource;

class CurrencyAdditionService
{

    public function __construct(
        private CurrencyConversionService $currencyConversionService,
        private CurrencyFormatService $currencyFormatService,
        private CurrencyResource $currencyResource
    )
    {
    }

    public function getFormattedTotal(float $amountOne, string $currencyOne, float $amountTwo, string $currencyTwo): string
    {
        $totalAmount = $this->getTotal($amountOne, $currencyOne, $amountTwo, $currencyTwo);

        $totalCurrencyResource = $this->currencyResource
            ->setAmount($totalAmount)
            ->setCurrency($currencyOne);

        $formattedAmount = $this->currencyFormatService
            ->getFormattedValue($totalCurrencyResource);

        return $formattedAmount;
    }

    public function getTotal(float $amountOne, string $currencyOne, float $amountTwo, string $currencyTwo): float
    {
        $amountTwoConverted = $this->currencyConversionService
            ->getConvertedAmount($currencyOne, $currencyTwo, $amountTwo);

        return round($amountOne + $amountTwoConverted, 2);
    }
}
