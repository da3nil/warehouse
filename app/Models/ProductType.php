<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProductType
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $category_id
 * @property int $supplier_id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'img',
        'category_id',
        'supplier_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'type_id', 'id');
    }
}
