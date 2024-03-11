<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Builder\ScopeWhereLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Profile extends Model
{
    use HasFactory, ScopeWhereLike;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'path',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'path' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
