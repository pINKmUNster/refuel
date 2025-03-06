<?php

namespace Module\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Vehicle\Factories\BrandFactory;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'brand_id');
    }

    protected static function newFactory(): BrandFactory
    {
        return BrandFactory::new();
    }
}
