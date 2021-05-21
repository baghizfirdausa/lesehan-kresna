<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = [
        'role',
    ];

    public function hasRole($role)
    {
        if ($role == $this->usertype) {
            return true;
        }
        return false;
    }
}
