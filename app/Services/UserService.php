<?php

namespace App\Services;

use App\Client;
use App\User;
use Illuminate\Support\Facades\DB;

class UserService {

    public function save(array $array) {
        DB::transaction(function () use($array) {
        $user = new User($array);
        $user->password = bcrypt($user->password);
        $user->save();

        $client =  new Client($array['client']);
        $client->user()->associate($user);
        $client->save();
        });
    }
}