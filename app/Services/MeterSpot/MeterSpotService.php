<?php

namespace App\Services\MeterSpot;

use App\Http\Resources\MeterSpotResource;
use App\Models\MeterSpot;
use Illuminate\Support\Facades\Response;


class MeterSpotService
{
    public function index(){
        $data = MeterSpot::with('charter')->get();
        return Response::successResponse($data,"Meter spot Fetched");
    }
    public function store($request){

        $meterSpot = MeterSpot::create([
            'project_id' => $request->project_id,
            'is_mpu' => $request->is_mpu,
            'status' => $request->status,
            ]);

        if($meterSpot){
            return Response::successResponse($meterSpot,"Meter spot Stored Success");
        }else{
            return Response::errorResponse("Meter Spot Stored not Success");
        }
    }

    public function show($id){
        $data = MeterSpot::find($id);

        if(!$data){
            return Response::errorResponse("No Meter Spot By This ID For Show");
        }

        $meterSpot = new MeterSpotResource($data);
        return Response::successResponse($meterSpot,"Meter Spot Fetched");
    }



    public function update($request,$id){
        $meterSpot = MeterSpot::find($id);

        if(!$meterSpot){
            return Response::errorResponse("No Meter spot  By This ID For Update");
        }
        $data = $meterSpot->update($request->all());

        return Response::successResponse([]," Meter Spot Updated");
    }
    public function destroy($id)
    {

        $meterSpot = MeterSpot::find($id);
        if(!$meterSpot){
            return Response::errorResponse("No Meter spot By This ID For Soft Delete");
        }

        $meterSpot->delete();
        return Response::successResponse([],"Meter spot soft deleted");

    }

}
