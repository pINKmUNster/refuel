<?php

namespace Module\Fuel\Jobs;

use Symfony\Component\DomCrawler\Crawler;

final class FuelPriceRaw
{
    public function __construct(
        public string $date,
        public string $gasoline98,
        public string $gasoline95,
        public string $diesel,
        public string $tva,
    ) {

    }

    public static function fromCell(Crawler $cell): FuelPriceRaw
    {
        return new self(
            date: $cell->eq(0)->text(),
            gasoline98: $cell->eq(1)->text(),
            gasoline95: $cell->eq(2)->text(),
            diesel: $cell->eq(3)->text(),
            tva: $cell->eq(6)->text(),
        );
    }
}
