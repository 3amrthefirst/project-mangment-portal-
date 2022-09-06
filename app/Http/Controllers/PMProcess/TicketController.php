<?php

namespace App\Http\Controllers\PMProcess;

use App\Http\Controllers\Controller;
use App\Services\PMProcess\TicketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TicketController extends Controller
{
    protected $service;

    public function __construct(TicketService $service)
    {
        $this->middleware(['auth:api'])->except('store');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $results = $this->service->index($request);
        return Response::successResponse($results);
    }

    public function ticketCounts(Request $request)
    {
        $results = $this->service->ticketCounts($request);
        return Response::successResponse($results);
    }

    public function show(Request $request, $id)
    {
        $result = $this->service->show($request, $id);
        return Response::successResponse($result);
    }

    public function store(Request $request)
    {
        $this->service->store($request);
        return Response::successResponse(['result' => 'Done successfully']);
    }

    public function assignUser(Request $request)
    {
        $this->service->assignUser($request);
        return Response::successResponse(['is_success' => 1]);
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }


}
