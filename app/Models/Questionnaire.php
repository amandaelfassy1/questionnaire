<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'event_id', 'type'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function responses()
{
    return $this->hasMany(Response::class);
}
public function hasUserResponded($userId)
{
    return $this->responses()->where('user_id', $userId)->exists();
}

}

