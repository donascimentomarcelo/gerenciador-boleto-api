<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    private $userService;

    /**
     * UserController constructor.
     * @param $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index(): JsonResponse {
        $lista = $this->userService->list();
        return response()->json($lista, 200);
    }

    public function store(Request $req): JsonResponse {
        $this->userService->save($req->all());
        return response()->json([], 201);
    }

}
