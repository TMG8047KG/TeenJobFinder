<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'company_name',
        'email',
        'password   ',
        'post',
    ];
    public function comments(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
