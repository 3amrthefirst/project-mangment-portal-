<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{

    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function register(Request $request)
    {
        $result = $this->service->register($request);
        return Response::successResponse($result);
    }

    public function login(Request $request)
    {
        $result = $this->service->login($request);

        return Response::successResponse($result);
    }

    public function logout(Request $request)
    {
        $this->service->logout($request);
        return Response::successResponse(['success' => 1]);
    }

    public function verify(Request $request)
    {
        $this->service->verify($request);
        return Response::successResponse(['success' => 1]);
    }
}
