<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Product
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property float $price
 * @property string $vat
 * @property string|null $description
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereQuantity($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereTitle($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereVat($value)
 * @mixin \Eloquent
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|ProductFeature[] $featureValues
 * @property-read int|null $feature_values_count
 */
class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'vat',
        'description',
        'quantity',
    ];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    /**
     * @return HasMany
     */
    public function featureValues(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function getFirstImageUrl(): string
    {
        if ($imageFirst = $this->getMedia('product_images')->last()) {
            return $imageFirst->getUrl();
        }

        return url('img/no-image.png');
    }

    /**
     * @return array
     */
    public function getAllImagesUrls(): array
    {
        $images = [];

        $imagesCollection = $this->getMedia('product_images');

        foreach ($imagesCollection as $media) {
            $images[] = $media->getUrl();
        }

        if (empty($images)) {
            $images[] = url('img/no-image.png');
        }

        return $images;
    }
}
