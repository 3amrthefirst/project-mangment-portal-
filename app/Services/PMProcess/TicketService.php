<?php

namespace App\Services\PMProcess;

use App\Http\Resources\PaginationResource;
use App\Http\Resources\TicketResource;
use App\Models\status\PmStatus;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TicketMedia;
use App\Models\User;
use App\Traits\ConsumesExternalService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TicketService
{
    use ConsumesExternalService;

    protected $baseUri;
    protected $ticket;

    public function __construct()
    {

        $env= config('app.env');
        $this->baseUri = config("gateway_services.$env.base_uri");
        $this->ticket  = new Ticket();
    }

    public function index($request)
    {
        $ticket = Ticket::with('user');

        $user = Auth::user();

        if ($user->type == 'pm') {
            $ticket = $ticket->where('user_id', $user->id);
        }

        if ($request->status) {
            $ticket = $ticket->where('status', $this->ticket->getStatus($request->status));
        }

        if ($request->return_all == 1) {
            return TicketResource::collection($ticket->get());
        }

        return new PaginationResource($ticket->paginate(), TicketResource::class);
    }

    public function ticketCounts($request)
    {
        $data = [];
        $user = Auth::user();

        $data['all_tickets'] = Ticket::where(function ($q) use ($user) {
            if ($user && $user->type == 'pm') {
                $q->where('user_id', $user->id);
            }
        })->count();


        $data['pending_tickets'] = Ticket::where('status', 1)->where(function ($q) use ($user) {
            if ($user && $user->type == 'pm') {
                $q->where('user_id', $user->id);
            }
        })->count();

        $data['assigned_tickets'] = Ticket::where('status', 2)->where(function ($q) use ($user) {
            if ($user && $user->type == 'pm') {
                $q->where('user_id', $user->id);
            }
        })->count();

        $data['approved_tickets'] = Ticket::where('status', 3)->where(function ($q) use ($user) {
            if ($user && $user->type == 'pm') {
                $q->where('user_id', $user->id);
            }
        })->count();

        $data['rejected_tickets'] = Ticket::where('status', 4)->where(function ($q) use ($user) {
            if ($user && $user->type == 'pm') {
                $q->where('user_id', $user->id);
            }
        })->count();

        return $data;
    }

    public function show($request, $id)
    {
        $ticket     = Ticket::with('user', 'ticketMedia')->where('id', $id)->firstOrFail();
        $ticketData = json_decode($this->performRequest('get', "leads/tickets/$ticket->lead_id/$ticket->opportunity_id/$ticket->contract_id"));

        $data                = [];
        $data['ticket']      = $ticket;
        $data['lead']        = $ticketData->data->lead;
        $data['contract']    = $ticketData->data->leadContract;
        $data['opportunity'] = $ticketData->data->opportunity;

        return $data;

    }

    public function store($request)
    {
        $request->merge([
            'client_name'    => $request->lead['first_name'] . ' ' . $request->lead['last_name'],
            'client_phone'   => $request->lead['phone'],
            'client_email'   => $request->lead['email'],
            'client_address' => $request->lead['location'],
            'lead_date'      => Carbon::parse($request->lead['created_at'])->format('Y-m-d H:i:s'),
            'lead_id'        => $request->lead['id'],
            'contract_id'    => $request->contract['id'],
            'opportunity_id' => $request->contract['opportunity_id']
        ]);

        $ticket = Ticket::create($request->all());

        PmStatus::create([
           'ticket_id' => $ticket->id
        ]);

        TicketMedia::create([
            'ticket_id' => $ticket->id,
            'lead_id'   => $ticket->lead_id,
            'type'      => 'contract',
            'url'       => $request->contract['contract_url']
        ]);

        foreach ($request->lead['medias'] as $media) {
            TicketMedia::create([
                'ticket_id' => $ticket->id,
                'lead_id'   => $ticket->lead_id,
                'type'      => isset($media['document_type']) ? $media['document_type'] : '',
                'url'       => $media['media_url']['display']
            ]);
        }
    }

    public function assignUser($request)
    {
        $user = User::findOrFail($request->user_id);
        Ticket::findOrFail($request->ticket_id)->update($request->only(['user_id', 'note']));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
