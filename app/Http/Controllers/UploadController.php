<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $req): JsonResponse {
        $image = $this->renameImage($req);
        Storage::disk('local')->put($image['filenametostore'], fopen($req->file('file'), 'r+'), 'public');
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function renameImage(Request $request): array {
        $return['filenametostore'] = $request->input('username').'.'.$request->file('file')->getClientOriginalExtension();
        return $return;
    }
}
