<?php

declare(strict_types=1);

/**
 * name値をdot記法へ変換
 * value[1][id] -> value.1.id
 *
 * @param  string $value
 * @return string
 */
function name_to_dot(string $value): string
{
    return str_replace(['[', ']'], ['.', ''], $value);
}
