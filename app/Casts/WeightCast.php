<?php

namespace App\Casts;

use App\Entities\Weight;
use App\Enums\WeightType;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class WeightCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $data = collect(json_decode($value, true));

        return new Weight(
            $data->get('unit'),
            WeightType::fromValue($data->get('type')),
        );
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if ( ! $value instanceof Weight) {
            return null;
        }

        return json_encode([
            'unit' => $value->unit,
            'type' => $value->type->getValue(),
        ]);
    }
}
