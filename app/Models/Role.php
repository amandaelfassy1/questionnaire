<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['role_name']; // 🔥 Ajout du champ autorisé
 

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
