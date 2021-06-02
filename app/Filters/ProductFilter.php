<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{
    public function category($id)
    {
        return $this->builder->where('category_id', $id);
    }

    public function brands($brandIds)
    {
        return $this->builder->whereIn('brand_id', $this->paramToArray($brandIds));
    }

    public function search($keyword)
    {
        return $this->builder->where('name', 'like', '%'.$keyword.'%');
    }

    public function price($order = 'asc')
    {
        return $this->builder->orderBy('price', $order);
    }
}
