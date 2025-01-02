<?php

namespace App\Entities;

use App\Enums\WeightType;

class Weight
{
<<<<<<< HEAD
    public function __construct(
        public int $unit = 0,
        public WeightType $type = WeightType::POUNDS
    ) {
=======
    public ?int $unit;
    public ?int $value;
    public WeightType $type;

    public function __construct(?int $unit = null, ?int $value = null, WeightType $type = WeightType::POUNDS)
    {
        $this->unit = $unit;
        $this->value = $value;
        $this->type = $type;
>>>>>>> tundeseun/devtest
    }
}
