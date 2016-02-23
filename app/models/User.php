<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
//    public $name;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];
}