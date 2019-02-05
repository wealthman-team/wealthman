<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

//    /**
//     * Check if the user has a role
//     * @param string $role
//     * @return bool
//     */
//    public function hasRole(string $role): bool
//    {
//        return $this->roles->where('name', $role)->isNotEmpty();
//    }
//
//    /**
//     * Check if the user has role admin
//     */
//    public function isAdmin(): bool
//    {
//        return $this->hasRole(Role::ROLE_ADMIN);
//    }
//
//    /**
//     * Check if the user has role editor
//     */
//    public function isEditor(): bool
//    {
//        return $this->hasRole(Role::ROLE_EDITOR);
//    }
//
//    /**
//     * Check if the user has role editor
//     */
//    public function isGuest(): bool
//    {
//        return $this->hasRole(Role::ROLE_GUEST);
//    }
//
//    /**
//     * Return the user's roles
//     */
//    public function roles(): belongsToMany
//    {
//        return $this->belongsToMany(Role::class)->withTimestamps();
//    }
}
