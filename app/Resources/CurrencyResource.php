<?php

namespace App\Resources;

use App\Exceptions\UnknownCurrencyException;
use App\Repositories\CurrencyRepository;

class CurrencyResource
{
    private float $amount;
    private string $currency;

    public function __construct(private CurrencyRepository $currencyRepository)
    {
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function setCurrency(string $isoCode): self
    {
        throw_if(
            !$this->currencyRepository->currencyExists($isoCode),
            new UnknownCurrencyException("Currency code {$isoCode} not known")
        );

        $this->currency = $isoCode;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
