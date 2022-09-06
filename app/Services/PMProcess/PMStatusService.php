<?php

namespace App\Services\PMProcess;

use App\Models\status\PmStatus;
use App\Models\status\PmStatusIssue;

class PMStatusService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
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
        return PmStatus::where('ticket_id', $id)->firstOrFail();
    }


    public function createIssue($request)
    {
        foreach ($request->all() as $item) {
            $item['ticket_id']    = $request->ticket_id;
            $item['pm_status_id'] = $request->ticket_id;
            PmStatusIssue::create($item);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
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
        PmStatusIssue::findOrFail($id)->delete();
    }
}
