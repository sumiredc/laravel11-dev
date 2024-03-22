<?php

namespace App\Enums;

enum StorageDisk: string
{
    case Local = 'local';
    case S3 = 's3';
}
