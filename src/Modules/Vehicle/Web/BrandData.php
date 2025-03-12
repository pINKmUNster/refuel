<?php

namespace Module\Vehicle\Web;

use Module\Vehicle\Model\Brand;
use Spatie\LaravelData\Data;

class BrandData extends Data
{
    public function __construct(
        public int $id,
        public string $label,
    ) {
    }

    public static function fromModel(Brand $brand): self
    {
        return new self(
            id: $brand->id,
            label: $brand->label,
        );
    }
}
