<?php

namespace App\Enums;

trait BaseEnum
{
    public static function values(): array
    {
        $oClass = new \ReflectionClass(__CLASS__);
        $constants = $oClass->getConstants();
        return array_values($constants);
    }
}
