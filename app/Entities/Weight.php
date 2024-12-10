<?php

namespace App\Entities;

use App\Enums\WeightType;

class Weight
{
    public function __construct(
        public int $unit = 0,
        public WeightType $type = WeightType::POUNDS
    ) {
    }
}
