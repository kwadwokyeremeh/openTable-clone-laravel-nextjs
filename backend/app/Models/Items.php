<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Items
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property int $restaurant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Restaurant $restaurant
 * @method static \Database\Factories\ItemsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Items newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Items newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Items query()
 * @method static \Illuminate\Database\Eloquent\Builder|Items whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Items whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Items whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Items whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Items wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Items whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Items whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description',
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => "$ ".($value).".00",
//            set: fn (string $value) => strtolower($value),
        );
    }
}
