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

    public  function client() {
        return $this->hasOne(Client::class);
    }
}
