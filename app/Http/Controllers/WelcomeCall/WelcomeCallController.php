<?php

namespace App\Http\Controllers\WelcomeCall;

use App\Http\Controllers\Controller;
use App\Http\Requests\WelcomeCallRequest;
use App\Http\Requests\WelcomeCallUpdateStatusRequest;
use App\Services\WelcomeCallServices\WelcomeCallService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WelcomeCallController extends Controller
{

    public $service;

    public function __construct()
    {
        $this->service = new WelcomeCallService();
        $this->middleware("auth:api");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->service->index();
    }

    public function getAllWelcomeCallsByStatus($status)
    {
        return $this->service->getAllWelcomeCallsByStatus($status);
    }

    public function index_pag()
    {
        return $this->service->index_pag();
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
    public function store(WelcomeCallRequest $request)
    {
        return $this->service->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WelcomeCall $welcomeCall
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result =  $this->service->show($id);
        return Response::successResponse($result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WelcomeCall $welcomeCall
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->service->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WelcomeCall $welcomeCall
     * @return \Illuminate\Http\Response
     */
    public function update(WelcomeCallRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function update_status(WelcomeCallUpdateStatusRequest $request, $id)
    {
        return $this->service->update_status($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WelcomeCall $welcomeCall
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function destroy_force_form_archive($id)
    {
        return $this->service->destroy_force_form_archive($id);
    }

    public function destroy_force($id)
    {
        return $this->service->destroy_force($id);
    }

    public function restore_welcome_call($id)
    {
        return $this->service->restore_welcome_call($id);
    }

    public function searchWelcomeCallByDate($dataFrom, $dataTo)
    {
        return $this->service->searchWelcomeCallByDate($dataFrom, $dataTo);
    }

    public function sendWelcomeEmail(Request $request)
    {
        $this->service->sendWelcomeEmail($request);
        return Response::successResponse(['success' => 1]);
    }

}
