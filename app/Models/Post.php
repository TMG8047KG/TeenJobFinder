<?php

namespace App\Models;

use http\QueryString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'skills', //Required skills or the skills you have
        'work_time',
        'salary',
        'description',
        'tag_id',
    ];

    public function tag() : HasOne
    {
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
