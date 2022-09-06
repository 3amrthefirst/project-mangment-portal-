<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessLicenseRequest;
use App\Http\Requests\BusinessLicenseUpdateRequest;
use App\Services\BusinessLicense\BusinessLicenseService;



class BusinessLicenceController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new BusinessLicenseService();
       // $this->middleware('auth:api');
    }
    public function index()
    {
        return $this->service->index();
    }
    public function store(BusinessLicenseRequest $request)
    {
        return $this->service->store($request);
    }
    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(BusinessLicenseUpdateRequest $request,$id)
    {
        return $this->service->update($request,$id);
    }
    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
