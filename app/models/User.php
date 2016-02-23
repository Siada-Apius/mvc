<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
//    public $name;

    protected $fillable = [
        'facebook_id',
        'fb_name',
        'fb_first_name',
        'fb_last_name',
        'email',
        'created_at',
        'updated_at'
    ];
}