<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends BaseController
{
    public function redirectGithub() {
        return $this->sendResponse('', [
            'link' => Socialite::driver('github')->stateless()->redirect()->getTargetUrl()
        ]);
    }
}
