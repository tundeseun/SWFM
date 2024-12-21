<?php

namespace App\Enums;

use InvalidArgumentException;

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

    public function getValue(): ?string
    {
        return match ($this) {
            self::POUNDS => t('lb'),
            self::OUNCES => t('oz'),
        };
    }

    public static function fromValue(?string $value): ?self
    {
        if ($value === null) {
            return null;
        }
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }
        return match ($value) {
            'lb' => self::POUNDS,
            'oz' => self::OUNCES,
            default => null,
        };
    }
}
