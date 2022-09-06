<?php

namespace App\Http\Controllers\PMProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\PmStatus\CreateStatusIssueRequest;
use App\Models\status\PmStatusIssue;
use App\Services\PMProcess\PMStatusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PMStatusController extends Controller
{
    protected $service;

    public function __construct(PMStatusService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->service->show($id);
        return Response::successResponse($result);
    }


    public function createIssue(CreateStatusIssueRequest $request)
    {
        $this->service->createIssue($request);
        return Response::successResponse(['success' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return Response::successResponse(['success' => 1]);
    }
}
