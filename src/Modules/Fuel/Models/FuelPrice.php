<?php

namespace Module\Fuel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Fuel\Factories\FuelPriceFactory;

class FuelPrice extends Model
{
    use HasFactory, SoftDeletes;

    protected static function newFactory(): FuelPriceFactory
    {
        return FuelPriceFactory::new();
    }
}
