<?php

namespace App\Entities;

use App\Enums\WeightType;

class Weight
{
    public ?int $unit;
    public ?int $value;
    public WeightType $type;

    public function __construct(?int $unit = null, ?int $value = null, WeightType $type = WeightType::POUNDS)
    {
        $this->unit = $unit;
        $this->value = $value;
        $this->type = $type;
    }
}
