<?php

namespace App\Observers;

use App\Models\ProductType;

class ProductTypeObserver
{

//    public function creating(ProductType $productType) {
//        if ($productType->isDirty('img')) {
//            if ($productType->img === null) {
//                $productType->img = 'storage/img/default-product.jpg';
//            }
//        }
//    }
//
//    public function updating(ProductType $productType) {
//        if ($productType->isDirty('img')) {
//            if ($productType->img === null) {
//                $productType->img = 'storage/img/default-product.jpg';
//            }
//        }
//    }

    /**
     * Handle the product type "created" event.
     *
     * @param  \App\Models\ProductType  $productType
     * @return void
     */
    public function created(ProductType $productType)
    {
        //
    }

    /**
     * Handle the product type "updated" event.
     *
     * @param  \App\Models\ProductType  $productType
     * @return void
     */
    public function updated(ProductType $productType)
    {
        //
    }

    /**
     * Handle the product type "deleted" event.
     *
     * @param  \App\Models\ProductType  $productType
     * @return void
     */
    public function deleted(ProductType $productType)
    {
        $productType->products()->delete();
    }

    /**
     * Handle the product type "restored" event.
     *
     * @param  \App\Models\ProductType  $productType
     * @return void
     */
    public function restored(ProductType $productType)
    {
        //
    }

    /**
     * Handle the product type "force deleted" event.
     *
     * @param  \App\Models\ProductType  $productType
     * @return void
     */
    public function forceDeleted(ProductType $productType)
    {
        //
    }
}
