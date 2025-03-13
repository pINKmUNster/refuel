<?php

namespace Module\Fuel;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

enum FuelTypeEnum: string
{
    case ELECTRIC = 'electric';
    case GASOLINE_98 = 'gasoline_98';
    case GASOLINE_95 = 'gasoline_95';
    case DIESEL = 'diesel';

    public function getDisplayName(): string
    {
        return match ($this) {
            self::ELECTRIC => 'Electric',
            self::GASOLINE_98 => 'Gasoline 98',
            self::GASOLINE_95 => 'Gasoline 95',
            self::DIESEL => 'Diesel',
        };
    }
}
