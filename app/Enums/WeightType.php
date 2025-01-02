<?php

namespace App\Enums;

enum WeightType: string
{
    case POUNDS = 'lb';

    case OUNCES = 'oz';

    public static function values(): array
    {
        return [
            self::POUNDS,
            self::OUNCES,
        ];
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::POUNDS => t('Pounds'),
            self::OUNCES => t('Ounces'),
        };
    }

    public function getValue():?string
    {
        return match ($this) {
            self::POUNDS => t('lb'),
            self::OUNCES => t('oz'),
        };
    }

    public static function fromValue(string $value): ?self
    {
        return match ($value) {
            'lb' => self::POUNDS,
            'oz' => self::OUNCES,
            default => null,
        };
    }
}
