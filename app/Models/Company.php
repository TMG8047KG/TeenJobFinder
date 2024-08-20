<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'id',
        'user_id',
        'company_name',
        'email',
        'password   ',
        'post',
    ];
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);

    }
    public function permission(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
    public function role(): HasOne
    {
        return $this->hasOne(Role::class);

    }
}
