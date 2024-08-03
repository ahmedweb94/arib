<?php

namespace App\Filters;

class UserFilter extends QueryFilter
{

    public function name($name)
    {
        $this->builder->where(function ($q) use ($name){
            $q->where('first_name', 'like', '%' . $name . '%')->orWhere('last_name', 'like', '%' . $name . '%');
        });
    }

    public function managerId($item)
    {
        $this->builder->where('user_id',$item);
    }

    public function email($email)
    {
        $this->builder->where('email',  $email);
    }

    public function phone($phone)
    {
        $this->builder->where('phone',  'like', '%' . $phone . '%');
    }
}
