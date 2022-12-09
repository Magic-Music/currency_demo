<?php

namespace App\Repositories;

use App\Models\Currency;

/*
 * A Repository layer sits between Models and Services
 * They query the model on behalf of the service, and decouple services from the underlying models
 * There can be formatting here but not business logic
 */
class CurrencyRepository
{
    public function currencyExists(string $isoCode): bool
    {
        return Currency::where('iso_code', $isoCode)
            ->exists();
    }

    public function addCurrency(
        string $isoCode,
        string $symbol,
        string $decimalSeparator,
        string $thousandsSeparator,
        bool $symbolBefore,
        float $dollarValue
    )
    {
        Currency::create([
            'iso_code'               => $isoCode,
            'symbol'                => $symbol,
            'decimal_separator'      => $decimalSeparator,
            'thousands_separator'    => $thousandsSeparator,
            'symbol_before'          => $symbolBefore,
            'dollar_value'           => $dollarValue,
        ]);
    }

    public function getCurrency(string $isoCode)
    {
        return Currency::where('iso_code', $isoCode)
            ->first();
    }

    public function getSymbol(string $isoCode): string
    {
        return Currency::where('iso_code', $isoCode)
            ->value('symbol');
    }

    public function getThousandsSeparator(string $isoCode): string
    {
        return Currency::where('iso_code', $isoCode)
            ->value('thousands_separator');
    }

    public function getDecimalSeparator(string $isoCode): string
    {
        return Currency::where('iso_code', $isoCode)
            ->value('decimal_separator');
    }

    public function getSymbolBefore(string $isoCode): bool
    {
        return Currency::where('iso_code', $isoCode)
            ->value('symbol_before');
    }

    public function getDollarValue(string $isoCode): float
    {
        return Currency::where('iso_code', $isoCode)
            ->value('dollar_value');
    }
}
