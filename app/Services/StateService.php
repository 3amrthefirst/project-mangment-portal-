<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class StateService
{
    use ConsumesExternalService;

    protected $baseUri;

    public function __construct()
    {
        $env           = config('app.env');
        $this->baseUri = config("gateway_services.$env.base_uri");
    }

    public function index($request)
    {
        $params = '';
        if($request->return_all)
        {
            $params .= 'return_all=1';
        }

        return json_decode($this->performRequest('get', "states?$params"));
    }

}
