<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
{
    public $name;
    public $timestamps = [];
    protected $fillable = [
        'name'
    ];
}