<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    protected $fillable = [
        'username',
        'password',
    ];
    public $timestamps = false;
    protected $hidden = ['password'];

    public  function client() {
        return $this->hasOne(Client::class);
    }
}
