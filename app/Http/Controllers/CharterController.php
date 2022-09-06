<?php

namespace App\Http\Controllers;

use App\Http\Requests\Charter\CharterRequest;
use App\Models\Charter;
use App\Service\CharterService;
use Illuminate\Http\Request;
use App\Mixins\ResponseMixins;
use Illuminate\Support\Facades\Response;

class CharterController extends Controller
{

    /* successResponse || errorResponse */
    protected $service;

    public function __construct(CharterService $service)
    {
        // $this->middleware('auth:api');
        $this->service = $service;
    }

    /**
     * Display a listing of the All Charter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->service->index($request->paginate);
        return Response::successResponse($data);
    }

    /**
     * Search In the Storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = $this->service->search($request->search);
        return Response::successResponse($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CharterRequest $request)
    {
        $data = $this->service->create($request->all());
        return Response::successResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharterRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function show(Charter $id)
    {
        $data = $this->service->show($id);
        return Response::successResponse($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function edit(Charter $charter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function update(CharterRequest $request, $id)
    {
        $charter = Charter::find($id);
        if ($charter)
            $charter->update($request->all());
        else return Response::errorResponse();
        return Response::successResponse($charter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Charter::findOrFail($id);
        $data->delete();
        return Response::successResponse($data);
    }

    /**
     * Restore deleted resources to storage.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $data = $this->service->restore($id);
        if ($data)
            return Response::successResponse($data);
        else return Response::errorResponse();
    }

    /**
     * Trashed resources From Storage.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        return 'test';
        $data = $this->service->trashed();
        if ($data)
            return Response::successResponse($data);
        else return Response::errorResponse();
    }

    /**
     * Remove the specified resource For Ever from storage.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function destroyForever($id)
    {
        $data = $this->service->destroyForever($id);
        if ($data)
            return Response::successResponse($data);
        else return Response::errorResponse();
    }
}
