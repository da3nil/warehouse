<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $total_amount
 * @property int $status_id
 * @property int $location_id
 * @property int $customer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $identifier
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property int $total
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderPosition[] $orderPositions
 * @property-read int|null $order_positions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 */
class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'identifier',
        'name',
        'email',
        'address',
        'phone',
        'content',
        'total'
    ];

    public function orderPositions()
    {
        return $this->hasMany(OrderPosition::class, 'order_id')->with(['product']);
    }
}
