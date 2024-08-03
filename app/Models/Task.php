<?php

namespace App\Models;

use App\Filters\Filterable;
use App\Helper\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory,Filterable;

    protected $guarded=[];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class,'employee_id');
    }

    public function statusIcon()
    {
        return match($this->status){
        TaskStatus::Pending => '<a ><i class="fa fa-clock" style="color:gray;"></i></a>',
        TaskStatus::InProgress => '<i class="fa fa-spinner" style="color:deepskyblue;"></i>',
        TaskStatus::Finished => '<i class="fa fa-check" style="color:forestgreen;"></i>',

        };
    }
}
