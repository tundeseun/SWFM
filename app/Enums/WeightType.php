<?php

namespace App\Enums;

<<<<<<< HEAD
enum WeightType: string
{
    case POUNDS = 'lb';

=======
use InvalidArgumentException;

enum WeightType: string
{
    case POUNDS = 'lb';
>>>>>>> tundeseun/devtest
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

<<<<<<< HEAD
    public function getValue():?string
=======
    public function getValue(): ?string
>>>>>>> tundeseun/devtest
    {
        return match ($this) {
            self::POUNDS => t('lb'),
            self::OUNCES => t('oz'),
        };
    }

<<<<<<< HEAD
    public static function fromValue(string $value): ?self
    {
=======
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
>>>>>>> tundeseun/devtest
        return match ($value) {
            'lb' => self::POUNDS,
            'oz' => self::OUNCES,
            default => null,
        };
    }
}
