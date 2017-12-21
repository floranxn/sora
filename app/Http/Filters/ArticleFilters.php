<?php

namespace App\Http\Filters;

class ArticleFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['keywords'];

    protected function keywords($keywords)
    {
        return $this->builder->where('title', 'like', '%' . $keywords . '%');
    }
}
