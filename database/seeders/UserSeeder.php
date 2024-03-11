<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Authority;
use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            'authority' => Authority::Administrator,
            'name' => 'Sumire',
            'email' => 'test@sumire-sakamoto.co.jp',
        ]);
    }
}
