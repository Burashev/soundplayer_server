<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends BaseController
{
    public function redirectGithub()
    {
        return $this->sendResponse('', [
            'link' => Socialite::driver('github')->stateless()->redirect()->getTargetUrl()
        ]);
    }

    public function callbackGithub(Request $request)
    {
        try {
            $user = Socialite::driver('github')->stateless()->user();
        } catch (\Exception $exception) {
            return $this->sendError('Code is not valid', [
            ], 401);
        }

        $userModel = User::query()->firstWhere('email', $user->email);

        if (!$userModel) {
            $userModel = User::query()->make([
                'email' => $user->email,
                'avatar' => $user->avatar,
                'nickname' => $user->nickname,
            ]);
        }
        $userModel->token = $user->token;
        $userModel->save();

        return $this->sendResponse('', new UserResource($userModel));
    }
}
