<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\StateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StateController extends Controller
{
    protected $service;

    public function __construct(StateService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $data = $this->service->index($request);
        return Response::successResponse($data);
    }
}
