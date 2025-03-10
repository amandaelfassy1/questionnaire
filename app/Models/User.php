<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Tables\Columns\Layout\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user');
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return $panel->getId() === 'admin' && $this->email === 'admin@gmail.com';
    }
    public function getRoleNameAttribute()
    {
        return $this->role ? $this->role->role_name : null;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function hasRole($roleName)
    {
        return $this->role && $this->role->role_name === $roleName;
    }



}
