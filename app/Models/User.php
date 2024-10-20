<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'age',
        'location',
        'phone',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function marked() : HasMany
    {
        return $this->hasMany(Marks::class);
    }

    public function getPhotoUrlAttribute()
    {
        // If the user has a photo, return its URL. Otherwise, return the default photo URL.
        return $this->photo ? asset('storage/' . $this->photo) : asset('https://avatar.iran.liara.run/username?username='. $this->username);
    }


}
