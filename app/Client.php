<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "client";
    protected $fillable = [
        'name',
        'lastname',
        'user_id',
    ];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
