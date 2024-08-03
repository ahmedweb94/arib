<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory,Filterable;

    protected $guarded=[];

    public function employees(): HasMany
    {
        return $this->hasMany(User::class,'department_id')->whereNotNull('user_id');
    }
}
