<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends BaseModel
{
    protected $fillable = ['id', 'username', 'password', 'token'];
}
