<?php

namespace App\Models;

use App\Enums\Price;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $main_img
 * @property string|null $images
 * @property string $open_time
 * @property string $close_time
 * @property string $slug
 * @property Price $price
 * @property int $location_id
 * @property int $cuisine_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cuisine $cuisine
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Items> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Location $location
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\RestaurantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCloseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCuisineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereMainImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereOpenTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Restaurant extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => Price::class,
    ];
    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'description', 'main_img', 'images', 'open_time', 'close_time', 'slug', 'price', 'location_id', 'cuisine_id',
    ];

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(Items::class);
    }

    /**
     * @return BelongsTo
     */
    public function cuisine(): BelongsTo
    {
        return $this->belongsTo(Cuisine::class);
    }

    /**
     * @return BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function calculateRating(): float|int
    {
        $total = $this->reviews()->count();
        if($total>0){
            $rating = $this->reviews()->sum('rating') /  $total;
            return round($rating,2);
        }
        return 0;
    }
}
