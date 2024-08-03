<?php

namespace App\Filters;

class DepartmentFilter extends QueryFilter
{

    public function name($name)
    {
        $this->builder->where(function ($q) use ($name){
            $q->where('name', 'like', '%' . $name . '%');
        });
    }

    public function status($status)
    {
        $this->builder->where('is_active', $status);
    }
}
