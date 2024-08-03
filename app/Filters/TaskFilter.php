<?php

namespace App\Filters;

class TaskFilter extends QueryFilter
{

    public function name($name)
    {
        $this->builder->where(function ($q) use ($name){
            $q->where('name', 'like', '%' . $name . '%')->orWhere('description', 'like', '%' . $name . '%');
        });
    }

    public function ownerId($item)
    {
        $this->builder->where('user_id',  $item);
    }

    public function employeeId($item)
    {
        $this->builder->where('employee_id', $item);
    }

    public function status($item)
    {
        $this->builder->where('status', $item);
    }
}
