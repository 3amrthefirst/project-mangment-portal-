<?php

namespace App\Service;

use App\Models\Charter;
use App\Models\status\PmStatus;
use Illuminate\Http\Request;

class CharterService
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paginate)
    {
        if ($paginate)
            return Charter::paginate((int)$paginate);
        else
            return Charter::get();
    }

    /**
     * Search In the Storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        $data = Charter::where('project_name', 'LIKE', "%$search%")
            ->orWhere('project_manager', 'LIKE', "%$search%")
            ->orWhere('project_system_size', 'LIKE', "%$search%")
            ->orWhere('project_installation_type', 'LIKE', "%$search%")
            ->orWhere('project_additional_permits', 'LIKE', "%$search%")
            ->orWhere('project_roofer', 'LIKE', "%$search%")
            ->orWhere('project_designer', 'LIKE', "%$search%")
            ->orWhere('submittal_process', 'LIKE', "%$search%")
            ->orWhere('utility_pto_process', 'LIKE', "%$search%")
            ->orWhere('utility_contact_email', 'LIKE', "%$search%")
            ->orWhere('utility_contact_mobile', 'LIKE', "%$search%")
            ->orWhere('roofing_contract_redecking', 'LIKE', "%$search%")
            ->orWhere('roofing_shingles', 'LIKE', "%$search%")
            ->orWhere('mpu_meter_spot', 'LIKE', "%$search%")
            ->orWhere('jurisdiction_contact_email', 'LIKE', "%$search%")
            ->orWhere('jurisdiction_contact_mobile', 'LIKE', "%$search%")
            ->orWhere('mpu_shutoff_required', 'LIKE', "%$search%")->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $charter                = Charter::create($request);
        $pmStatus               = PmStatus::where('ticket_id', $request->ticket_id)->first();
        $pmStatus->welcome_call = 5;
        $pmStatus->save();
        return $charter;
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
        return Charter::find($id);
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
    public function update($request, $charter)
    {

        return $charter;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $char = Charter::find($id);

        $char->delete();

        return "success";
    }

    /**
     * Restore deleted resources to storage.
     *
     * @param \App\Models\Charter $charter
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $data = Charter::onlyTrashed()->where('id', $id)->first();
        if ($data) {
            $data->restore();
            return $data;
        }
        else return false;
    }

    /**
     * Trashed resources From Storage.
     *
     * @param \App\Models\Charter $charter
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $data = Charter::onlyTrashed()->get();
        return $data;
    }

    /**
     * Remove the specified resource For Ever from storage.
     *
     * @param \App\Models\Charter $charter
     * @return \Illuminate\Http\Response
     */
    public function destroyForever($id)
    {
        $data = Charter::onlyTrashed()->find($id);
        if ($data) {
            $data->forceDelete();
            return $data;
        }
        else {
            return false;
        }
    }
}
