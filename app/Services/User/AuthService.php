<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthService
{
    public function register($request)
    {


    }

    public function login($request)
    {
        $user = User::where('email', $request->email)
            ->first();

        if (!$user) {
            throw new BadRequestHttpException(Lang::get('messages.'));
        }

        $user->validateForPassportPasswordGrant($request->password);

        $user['token'] = $user->createToken('Admin Token')->accessToken;
        return $user;
    }

    public function logout($request)
    {

    }

    public function verify($request)
    {

    }
}
