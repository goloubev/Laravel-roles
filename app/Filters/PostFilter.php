<?php

namespace App\Filters;

class PostFilter extends QueryFilter
{
    public function search($search_string = null)
    {
        if (isset($search_string)) {
            return $this->builder
                ->where('title', 'LIKE', '%'.$search_string.'%');
                //->orWhere('text', 'LIKE', '%'.$search_string.'%');
        }
    }

    public function category($category_id = null)
    {
        if (isset($category_id)) {
            return $this->builder->where('category_id', $category_id);
        }
    }
}
