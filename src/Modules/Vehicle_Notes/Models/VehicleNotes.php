<?php

namespace Module\Vehicle_Notes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\Vehicle\Model\Vehicle;
use Module\Vehicle_Notes\Factories\VehicleNotesFactory;

class VehicleNotes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mileage',
        'fuel_quantity',
        'date',
        'vehicle_id',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public static function newFactory(): VehicleNotesFactory
    {
        return VehicleNotesFactory::new();
    }
}
