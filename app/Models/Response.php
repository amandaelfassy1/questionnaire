<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'user_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
