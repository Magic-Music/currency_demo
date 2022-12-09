<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;
use App\Resources\CurrencyResource;

class CurrencyFormatService
{
    /*
     * Only the required dependency is injected here
     */
    public function __construct(private  CurrencyRepository $currencyRepository)
    {
    }

    /*
     * The resource is passed directly to the function that needs it
     */
    public function getFormattedValue(CurrencyResource $currencyResource): string
    {
        $amount   = $currencyResource->getAmount();
        $isoCode = $currencyResource->getCurrency();

        $currencyData = $this->currencyRepository->getCurrency($isoCode);

        $formattedValue = number_format($amount, 2, $currencyData->decimal, $currencyData->thousands);

        return $currencyData->symbolBefore
            ? $currencyData->symbol . $formattedValue
            : $formattedValue . $currencyData->symbol;
    }
}
