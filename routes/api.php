<?php

declare(strict_types=1);

$targetDir = 'routes/api/';
$paths = glob(base_path("{$targetDir}*"));
foreach ($paths as $path) {
    include_once $path;
}
