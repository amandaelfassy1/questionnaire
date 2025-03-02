<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_time', 'end_time'];
    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
    public function users()
{
    return $this->belongsToMany(User::class, 'event_user');
}

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }
}
