<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends BaseController
{
    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error', $validator->errors(), 401);
        }

        $author = Author::query()->create([
           'name' => $request->input('name'),
        ]);

        return $this->sendResponse('Author created', new AuthorResource($author));
    }

    public function showGet(Author $author)
    {
        return $this->sendResponse('', new AuthorResource($author));
    }
}
