<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'ticket_id',
        'user_id',
    ];
}
