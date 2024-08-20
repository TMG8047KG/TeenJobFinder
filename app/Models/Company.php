<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
