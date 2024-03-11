<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\User\UserEmailStatusCast;
use App\Enums\Authority;
use App\Models\Builder\ScopeWhereLike;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([UserObserver::class])]
final class User extends Authenticatable
{
    use HasFactory, Notifiable, ScopeWhereLike;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'authority',
        'name',
        'email',
        'password',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<int, string>
     */
    protected $casts = [
        'email_status' => UserEmailStatusCast::class,
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'uuid' => 'string',
            'authority' => Authority::class,
            'name' => 'string',
            'email' => 'string',
            'password' => 'hashed',
            'remember_token' => 'string',
            'email_verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * @return bool
     */
    public function isAdministrator(): bool
    {
        return $this->authority === Authority::Administrator;
    }

    /**
     * @return bool
     */
    public function isCustomer(): bool
    {
        return $this->authority === Authority::Customer;
    }
}
