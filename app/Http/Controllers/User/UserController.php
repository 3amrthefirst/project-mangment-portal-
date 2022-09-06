<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\UserService;
use App\Traits\CrudTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use CrudTrait;

    protected $service;

    public function __construct(Request $request)
    {
        $this->fields = ['name', 'email', 'type'];
        $this->model  = new User();
    }

    public function filterData($request, $data)
    {
        return $data->where('type', $request->type);
    }
}
