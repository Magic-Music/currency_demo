<?php

namespace App\Console\Commands;

use App\Services\CurrencyAdditionService;
use Illuminate\Console\Command;

class CurrencyTotal extends Command
{

    protected $signature = 'currency:total {amount1} {currency1} {amount2} {currency2}';
    protected $description = 'Command description';

    public function __construct(private CurrencyAdditionService $currencyAdditionService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info($this->currencyAdditionService
            ->getTotal(
                $this->argument('amount1'),
                $this->argument('currency1'),
                $this->argument('amount2'),
                $this->argument('currency2')
            )
        );

        return Command::SUCCESS;
    }
}
