<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\TokenRepository;

class AuthApiController extends Controller
{
    public function regester(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'name'     => 'required',
//            'email'    => 'required|email|unique:users,email',
//            'password' => 'required|min:8'
//        ]);
//
//        if ($validator->fails()) {
//            return Response::errorResponse($validator->errors()->first());
//        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        $user['token'] = $user->createToken('passport_token')->accessToken;
        return Response::successResponse($user);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::errorResponse($validator->errors()->first());
        }

        $input = $request->only(['email', 'password']);
        if (auth()->attempt($input)) {
            $token = auth()->user()->createToken('passport_token')->accessToken;
            $user  = auth()->user();

            $data = ['user' => $user, 'token' => $token];
            return Response::successResponse($data);

        }
        else {
            return Response::errorResponse('email or password incorrect');
        }

    }

    public function logout()
    {
        $token = auth()->user()->token();


        $tokenReposetory = app(TokenRepository::class);
        $tokenReposetory->revokeAccessToken($token->id);

        // use this method to logout from all devices
        // $refreshTokenRepository = app(RefreshTokenRepository::class);
        // $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($$access_token->id);


        return Response::successResponse([], "logout success");

    }


}
