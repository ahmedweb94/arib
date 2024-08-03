<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,InteractsWithMedia,Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'user_id',
        'department_id',
        'salary',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($this->getFirstMediaUrl('images') != '' ? $this->getFirstMediaUrl('images') : asset('assets/avatar.png')),
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => (Hash::make($value)),
        );
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst($this->first_name).' '.ucfirst($this->last_name),
        );
    }

    public function scopeEmployee(Builder $query)
    {
        return $query->whereNotNull('user_id');
    }

    public function scopeManager(Builder $query)
    {
        return $query->whereNull('user_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(User::class,'user_id');
    }

    public function employeeTasks(): HasMany
    {
        return $this->hasMany(Task::class,'employee_id');
    }

    public function managerTasks(): HasMany
    {
        return $this->hasMany(Task::class,'manager_id');
    }

}
