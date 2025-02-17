<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['questionnaire_id', 'question_text', 'type', 'options'];

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
