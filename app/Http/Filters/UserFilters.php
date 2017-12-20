<?php

namespace App\Http\Filters;

class UserFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['keywords', 'status'];

    protected function keywords($keywords)
    {
        return $this->builder->where('uname', 'like', '%' . $keywords . '%')
            ->orWhere('email', 'like', '%' . $keywords . '%')
            ->orWhere('mobile', 'like', '%' . $keywords . '%');
    }

    protected function status($status)
    {
        return $this->builder->where('status', $status);
    }
}
