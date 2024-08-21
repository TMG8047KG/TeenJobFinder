<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        'email'
    ];

    protected $table = 'companies';

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
