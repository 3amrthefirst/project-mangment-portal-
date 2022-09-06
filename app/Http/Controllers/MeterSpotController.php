<?php

namespace App\Http\Controllers;
use App\Http\Requests\MeterSpotRequest;
use App\Http\Requests\MeterSpotUpdateRequest;
use App\Services\MeterSpot\MeterSpotService;

class MeterSpotController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new MeterSpotService();
    }
    public function index()
    {

        return $this->service->index();
    }
    public function store(MeterSpotRequest $request)
    {
        return $this->service->store($request);
    }
    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(MeterSpotUpdateRequest $request,$id)
    {
        return $this->service->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
