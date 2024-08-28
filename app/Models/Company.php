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

    //Do not touch (please)
    protected $fillable = [
        'name',
        'address',
        'phone',
        'description',
        'email',
        'photo'
    ];

    protected $table = 'company';

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function getPhotoUrlAttribute()
    {
        // If the user has a photo, return its URL. Otherwise, return the default photo URL.
        return $this->photo ? asset('storage/' . $this->photo) : asset('images/placeholder-avatar.jpg');
    }
}
