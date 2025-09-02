<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use Notifiable, AuthenticatableTrait;

    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'password',
    ];
}
