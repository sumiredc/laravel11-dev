<?php

declare(strict_types=1);

$targetDir = 'routes/web/';
$paths = glob(base_path("{$targetDir}*"));
foreach ($paths as $path) {
    include_once $path;
}
