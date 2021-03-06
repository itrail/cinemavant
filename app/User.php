<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
use Notifiable;

/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'firstname', 'surname', 'email', 'password', 'new_password',
];

/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token',
];



    /**
* Add a mutator to ensure hashed passwords
*/
public function setPasswordAttribute($password)
{
$this->attributes['password'] = Hash::make($password);
}
}
