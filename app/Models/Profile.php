<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\StorageDisk;
use App\Models\Builder\ScopeWhereLike;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Profile extends Model
{
    use HasFactory, ScopeWhereLike;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'path',
        'mime_type',
        'original_name',
        'extension',
        'disk',
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
            'user_id' => 'integer',
            'path' => 'string',
            'mime_type' => 'string',
            'original_name' => 'string',
            'extension' => 'string',
            'disk' => StorageDisk::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
