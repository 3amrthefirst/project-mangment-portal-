<?php

namespace App\Services\WelcomeCallServices;

use App\Http\Resources\PaginationResource;
use App\Http\Resources\WelcomeCallResource;
use App\Models\status\PmStatus;
use App\Models\Ticket\Ticket;
use App\Models\User;
use App\Models\WelcomeCall;
use App\Notifications\SendWelcomeMail;
use App\Notifications\SendWelcomePackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;

class WelcomeCallService
{
    public function store($request)
    {

        $Welcome = WelcomeCall::create([
            'user_id'          => auth()->user()->id,
            'any_locked_gates' => $request->any_locked_gates,
            'any_dogs'         => $request->any_dogs,
            'any_unpermitted'  => $request->any_unpermitted,
            'comment'          => $request->comment,
            'ticket_id'        => $request->ticket_id
        ]);

        $pmStatus = PmStatus::where('ticket_id', $request->ticket_id)->first();
        $pmStatus->welcome_call = 5;
        $pmStatus->save();

        Ticket::find($request->ticket_id)->update(['project_status' => 'welcome_call']);

        if ($Welcome) {
            return Response::successResponse($Welcome, "WelcomeCall Stored Success");
        }
        else {
            return Response::errorResponse("WelcomeCall Stored not Success");
        }
    }

    public function index()
    {
        $Welcome = WelcomeCall::with(["User" => function ($q) {
            $q->select('id', 'name');
        }])->get();

        $WelcomeCalls = WelcomeCallResource::collection($Welcome);
        return Response::successResponse($WelcomeCalls, "WelcomeCalls Fetched");
    }

    public function index_pag()
    {
        $Welcome      = WelcomeCall::with(["User" => function ($q) {
            $q->select('id', 'name');
        }])->paginate(10);
        $WelcomeCalls = PaginationResource::collection($Welcome);
        return Response::successResponse($WelcomeCalls, "WelcomeCalls Fetched");
    }

    public function getAllWelcomeCallsByStatus($Status)
    {
        $WelcomeCalls = WelcomeCall::where('status', $Status)->with(["User" => function ($q) {
            $q->select('id', 'name');
        }])->get();

        if ($WelcomeCalls->isEmpty()) {
            return Response::successResponse([], "No WelcomeCall By This Status");
        }

        $Welcome = WelcomeCallResource::collection($WelcomeCalls);
        return Response::successResponse($Welcome, "WelcomeCalls Fetched");
    }


    public function show($id)
    {

        $data = WelcomeCall::findOrFail($id);

        if (!$data) {
            return Response::errorResponse("No WelcomeCall By This ID For Show");
        }

        return new WelcomeCallResource($data);
    }

    public function edit($id)
    {
        $data = WelcomeCall::find($id);

        if (!$data) {
            return Response::errorResponse("No WelcomeCall By This ID For Edit");
        }

        $WelCome = new WelcomeCallResource($data);
        return Response::successResponse($WelCome, "WelcomeCalls Fetched");
    }

    public function update($request, $id)
    {
        $WelcomeCall = WelcomeCall::find($id);

        if (!$WelcomeCall) {
            return Response::errorResponse("No WelcomeCall By This ID For Update");
        }

        $WelcomeCall->update([
            'any_locked_gates' => $request->any_locked_gates,
            'any_dogs'         => $request->any_dogs,
            'any_unpermitted'  => $request->any_unpermitted,
            'comment'          => $request->comment
        ]);
        return Response::successResponse([], "WelcomeCall Updated");
    }

    public function update_status($request, $id)
    {
        $WelcomeCall = WelcomeCall::find($id);

        if (!$WelcomeCall) {
            return Response::errorResponse("No WelcomeCall By This ID For Update");
        }

        $WelcomeCall->update([
            'status' => $request->status
        ]);
        return Response::successResponse([], "WelcomeCall Updated Status");
    }

    public function destroy($id)
    {

        $WelcomeCall = WelcomeCall::find($id);
        if (!$WelcomeCall) {
            return Response::errorResponse("No WelcomeCall By This ID For Soft Delete");
        }

        $WelcomeCall->delete();
        return Response::successResponse([], "WelcomeCall soft deleted");

    }

    public function destroy_force($id)
    {

        $WelcomeCall = WelcomeCall::find($id);
        if (!$WelcomeCall) {
            return Response::errorResponse("No WelcomeCall By This ID For Force Delete");
        }

        $WelcomeCall->forceDelete();
        return Response::successResponse([], "WelcomeCall force deleted");
    }

    public function destroy_force_form_archive($id)
    {

        $WelcomeCall = WelcomeCall::onlyTrashed()->find($id);
        if (!$WelcomeCall) {
            return Response::errorResponse("No WelcomeCall By This ID In Archive For Force Delete");
        }

        $WelcomeCall->forceDelete();
        return Response::successResponse([], "WelcomeCall force deleted from archive");
    }

    public function restore_welcome_call($id)
    {

        $WelcomeCall = WelcomeCall::onlyTrashed()->find($id);
        if (!$WelcomeCall) {
            return Response::errorResponse("No WelcomeCall By This ID For Restore");
        }

        $WelcomeCall->restore();
        return Response::successResponse([], "WelcomeCall restored");

    }

    public function searchWelcomeCallByDate($dataFrom, $dateTo)
    {
        $dataFrom .= " 00:00:00";
        $dateTo   .= " 23:59:59";

        $WelcomeCalls = WelcomeCall::with(["User" => function ($q) {
            $q->select('id', 'name');
        }])->whereBetween('created_at', [$dataFrom, $dateTo])->get();

        $WelcomeCalls = WelcomeCallResource::collection($WelcomeCalls);

        if (isset($WelcomeCalls) && count($WelcomeCalls) != 0) {
            return Response::successResponse($WelcomeCalls, "WelcomeCalls Fetched");
        }
        else {
            return Response::successResponse([], "No WelcomeCalls Created By This Date");
        }

    }

    public function sendWelcomeEmail($request)
    {
        $ticket = Ticket::where('id', $request->id)->firstOrFail();

        if ($ticket->client_email) {
            $user = Auth::user();

            $pdf = \PDF::loadView('WelcomeMail.WelcomeEnglish', $user->toArray());

            if (!file_exists(storage_path('/app/public/welcome_email/' . date('Y')))) {
                mkdir(storage_path('/app/public/welcome_email/' . date('Y')), 0777, true);
            }

            $pdf_path               = "/welcome_email/" . date("Y") . "/" . $ticket->id . rand(11111, 99999) . ".pdf";
            $ticket->pdf_path       = $pdf_path;
            $ticket->project_status = 'send_welcome_package';
            $ticket->save();
            $pdf->setPaper('a4')->save(storage_path() . '/app/public' . $pdf_path);
            Notification::route('mail', $ticket->client_email)->notify(new SendWelcomeMail($ticket));
            $pmStatus = PmStatus::where('ticket_id', $ticket->id)->first();
            $pmStatus->welcome_call = 5;
            $pmStatus->save();
        }


    }

}
