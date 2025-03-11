<?php

namespace Module\Fuel;

enum FuelType: string
{
    case ELECTRIC = 'electric';
    case GASOLINE = 'gasoline';
    case DIESEL = 'diesel';

    public function getDisplayName(): string
    {
        return match ($this) {
            self::ELECTRIC => 'Electric',
            self::GASOLINE => 'Gasoline',
            self::DIESEL => 'Diesel',
        };
    }
}
