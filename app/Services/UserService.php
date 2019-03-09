<?php

namespace App\Services;

use App\Client;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService {

    public function list(): LengthAwarePaginator {
        return Client::paginate(5);
    }

    public function listAll(): Collection {
        return Client::with('user')->get();
    }

    public function save(array $array): void {
        DB::transaction(function () use($array) {
        $user = new User($array);
        $user->password = bcrypt($user->password);
        $user->save();

        $client =  new Client($array['client']);
        $client->user()->associate($user);
        $client->save();
        });
    }

    public function findOne(int $id): ?User {
        return User::with('client')->find($id);
    }

    public function edit(array $req, int $id) {
        $user = $this->findOne($id);

        if ($user) {
            DB::transaction(function () use($user, $req) {
                $user->username = $req['username'];
                $user->client->name = $req['client']['name'];
                $user->client->lastname = $req['client']['lastname'];
                $user->client->save();
                $user->save();
            });
        }
    }

    public function delete(int $id): void {
        $user = $this->findOne($id);
        Storage::delete($user->username.'.pdf');
        User::find($id)->delete();
    }
}