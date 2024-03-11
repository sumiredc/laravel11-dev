<?php

declare(strict_types=1);

namespace App\View;

use InvalidArgumentException;

trait EnumToItemsTrait
{
    /**
     * @param  string                   $enum
     * @param  string                   $label
     * @param  string                   $value
     * @param  bool                     $labelIsFunc
     * @param  bool                     $valueIsFunc
     * @return array
     * @throws InvalidArgumentException
     */
    private function convertEnumToItems(
        string $enumClass,
        string $label = 'name',
        string $value = 'value',
        bool $labelIsFunc = false,
        bool $valueIsFunc = false
    ): array {
        if (!enum_exists($enumClass)) {
            throw new InvalidArgumentException;
        }

        return array_map(fn (object $enum) => [
            'label' => $labelIsFunc ? $enum->$label() : $enum->$label,
            'value' => $valueIsFunc ? $enum->$value() : $enum->$value,
        ], $enumClass::cases());
    }
}
