<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive(Builder $query): Builder{
        return $query->where('active', 1);
    }

    public function scopeInStock(Builder $query): Builder{
        return $query->where('stock', '>', 0);
    }

    public function scopeCheeperProducts(Builder $query): Builder{
        return $query->where('price', '<', 100);
    }

    public function scopePriceBetween(Builder $query, Float $min, Float $max): Builder
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopeCategory(Builder $query, Category $categoryId): Builder{
        return $query->where('category_id', $categoryId->id);
    }

    // Accesseur : formater le prix pour l'affichage
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format(
                $this->price, 2, ',', ' ') . ' €',
        );
    }

    protected function isInStock(): Attribute {
        return Attribute::make(
            get: fn () => $this->stock ? 'En stock' : 'En rupture'
        );
    }

    protected function stockStatus(): Attribute {
        return Attribute::make(
            get: fn () => match (true) {
                $this->stock <= 0 => 'En rupture',
                $this->stock < 5 => 'En stock limité',
                default => 'En stock'
            }
        );
    }

    // Mutateur : slug automatique depuis le nom
    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => [
                'name' => $value,
                'slug' => Str::slug($value),
            ],
        );
    }

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
        'active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];
}
