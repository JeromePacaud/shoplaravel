<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperTag
 */
class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}
