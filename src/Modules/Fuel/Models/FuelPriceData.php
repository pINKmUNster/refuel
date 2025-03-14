<?php

namespace Module\Fuel\Models;

use Carbon\Carbon;
use Hybridly\Support\Data\DataResource;
use Module\Fuel\FuelTypeEnum;

class FuelPriceData extends DataResource
{
    public static array $authorizations = [];

    public function __construct(
        public int $id,
        public FuelTypeEnum $fuel_type,
        public string $price,
        public Carbon|string $date,
    ) {
        // Make sure date is a Carbon instance
        if (is_string($this->date)) {
            $this->date = Carbon::parse($this->date);
        }
    }
}
