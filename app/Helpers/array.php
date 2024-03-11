<?php

declare(strict_types=1);

use Illuminate\Support\Str;

/**
 * 連想配列keyをsnake_caseへ変換
 * ['userId' => 0] -> ['user_id' => 0]
 *
 * @param  array $array
 * @return array
 */
function key_to_snake(array $array): array
{
    $converted = [];
    foreach ($array as $k => $v) {
        $converted[Str::snake($k)] = $v;
    }

    return $converted;
}
