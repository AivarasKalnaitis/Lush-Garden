<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Order
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $status
 * @property string $customer_title
 * @property string $customer_email
 * @property string|null $customer_phone
 * @property string $customer_address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|OrderItem[] $items
 * @property-read int|null $items_count
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCustomerAddress($value)
 * @method static Builder|Order whereCustomerEmail($value)
 * @method static Builder|Order whereCustomerPhone($value)
 * @method static Builder|Order whereCustomerTitle($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User|null $user
 */
class Order extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'status',
        'customer_title',
        'customer_email',
        'customer_phone',
        'customer_address',
    ];

    /**
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
