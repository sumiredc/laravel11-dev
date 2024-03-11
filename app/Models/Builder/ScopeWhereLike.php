<?php

declare(strict_types=1);

namespace App\Models\Builder;

use Illuminate\Database\Eloquent\Builder;

trait ScopeWhereLike
{
    /**
     * 部分一致検索
     *
     * @param  Builder $query
     * @param  string  $column
     * @param  string  $keyword
     * @return void
     */
    public function scopeWhereLike($query, string $column, string $keyword)
    {
        return $query->where($column, 'like', '%' . addcslashes($keyword, '%_\\') . '%');
    }

    /**
     * 前方一致検索
     *
     * @param  Builder $query
     * @param  string  $column
     * @param  string  $keyword
     * @return void
     */
    public function scopeWhereLikeForward($query, string $column, string $keyword)
    {
        return $query->where($column, 'like', addcslashes($keyword, '%_\\') . '%');
    }
}
