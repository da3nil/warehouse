<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderPosition
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderPosition extends Model
{
    //
}
