<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'jobs';

    protected $fillable = ['title', 'work-time', 'salary'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
