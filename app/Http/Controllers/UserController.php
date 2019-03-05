<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return response()->json($lista, Response::HTTP_OK);
    }

    public function store(Request $req): JsonResponse {
        $this->userService->save($req->all());
        return response()->json([], Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse {
        $user = $this->userService->findOne($id);
        return response()->json($user, Response::HTTP_OK);
    }

    public function update(Request $req, int $id): JsonResponse {
        $this->userService->edit($req->all(), $id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function delete(Request $req): JsonResponse {
        $this->userService->delete($req->input());
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
