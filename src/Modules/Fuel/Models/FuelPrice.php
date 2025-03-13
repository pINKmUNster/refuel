<?php

namespace Module\Fuel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Fuel\Factories\FuelPriceFactory;
use Module\Fuel\FuelTypeEnum;

class FuelPrice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['fuel_type', 'price', 'date'];

    protected static function newFactory(): FuelPriceFactory
    {
        return FuelPriceFactory::new();
    }

    /**
     * @param  FuelPriceRaw  $fuelPriceRaw
     * @return array
     */
    public static function fromRaw(FuelPriceRaw $fuelPriceRaw): array
    {
        $gasoline98 = new FuelPrice([
            'fuel_type' => FuelTypeEnum::GASOLINE_98,
            'price' => $fuelPriceRaw->gasoline98,
            'date' => $fuelPriceRaw->date,
        ]);
        $diesel = new FuelPrice([
            'fuel_type' => FuelTypeEnum::DIESEL,
            'price' => $fuelPriceRaw->diesel,
            'date' => $fuelPriceRaw->date,
        ]);
        $gasoline95 = new FuelPrice([
            'fuel_type' => FuelTypeEnum::GASOLINE_95,
            'price' => $fuelPriceRaw->gasoline95,
            'date' => $fuelPriceRaw->date,
        ]);

        return [$gasoline98, $gasoline95, $diesel];
    }
}
