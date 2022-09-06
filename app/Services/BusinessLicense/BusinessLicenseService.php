<?php

namespace App\Services\BusinessLicense;

use App\Http\Resources\BusinessLicenseResource;
use App\Models\BusinessLicense;
use Illuminate\Support\Facades\Response;


class BusinessLicenseService
{
    public function index(){
        $data = BusinessLicense::with('charter')->get();
        //$business =  BusinessLicenseResource::collection($data);
        return Response::successResponse($data,"business license Fetched");
    }
    public function store($request){

        $business = BusinessLicense::create($request->all());
        if($business){
            return Response::successResponse($business,"business license Stored Success");
        }else{
            return Response::errorResponse("business license Stored not Success");
        }
    }

    public function show($id){
        $data = BusinessLicense::find($id);

        if(!$data){
            return Response::errorResponse("No business license By This ID For Show");
        }

        $business = new BusinessLicenseResource($data);
        return Response::successResponse($business,"business license Fetched");
    }



    public function update($request,$id){
        $business = BusinessLicense::find($id);

        if(!$business){
            return Response::errorResponse("No business licence  By This ID For Update");
        }

        $business->update([
            'project_id' => $request->project_id,
            'status' => $request->status,
        ]);

        return Response::successResponse([]," business licence Updated");
    }
    public function destroy($id)
    {

        $business = BusinessLicense::find($id);
        if(!$business){
            return Response::errorResponse("No business licence By This ID For Soft Delete");
        }

        $business->delete();
        return Response::successResponse([],"business licence soft deleted");

    }

}
