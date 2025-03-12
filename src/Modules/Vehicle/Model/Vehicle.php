<?php

namespace Module\Vehicle\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Fuel\FuelTypeEnum;
use Module\User\User;
use Module\Vehicle\Factories\VehicleFactory;
use Module\Vehicle\VehicleTypeEnum;

final class Vehicle extends Model
{
    protected $fillable = [
        'fuel_type',
        'type',
        'brand_id',
        'user_id',
        'vin',
        'licence_plate',
        'year',
        'mileage',
    ];

    use HasFactory, SoftDeletes;

    protected $table = 'vehicles';
    protected $casts = [
        'fuel_type' => FuelTypeEnum::class,
        'type' => VehicleTypeEnum::class,
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function newFactory(): VehicleFactory
    {
        return VehicleFactory::new();
    }
}
