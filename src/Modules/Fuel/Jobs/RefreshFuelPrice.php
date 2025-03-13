<?php

namespace Module\Fuel\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

final class RefreshFuelPrice implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        $fuelPricesRaws = $this->getContent();
        $tvaPrices = $this->onlyWithTva($fuelPricesRaws);

    }

    /**
     * @return array FuelPriceRaw[]
     * @throws ConnectionException
     */
    private function getContent(): array
    {
        $response = Http::get('https://www.petrol.lu/prix-officiels/')->body();
        $crawler = new Crawler($response);
        $secondPricesTable = $crawler->filter('div.prices-table')->eq(1);
        return $secondPricesTable->filter('tbody > tr')->each(function (Crawler $node) {
            $cells = $node->filter('td');
            return
                FuelPriceRaw::fromCell($cells);

        });
    }

    /**
     * @param  array  $fuelPricesRaws FuelPriceRaw[]
     * @return array FuelPriceRaw[]
     */
    public function onlyWithTva(array $fuelPricesRaws): array
    {
        return Arr::where($fuelPricesRaws, function ($fuelPricesRaw) {
            return $$fuelPricesRaw->tva === "TVAC";
        });
    }
}
