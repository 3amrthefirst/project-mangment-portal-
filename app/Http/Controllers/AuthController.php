<?php

namespace App\Http\Controllers;

use App\Traits\GeneralTrait;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use GeneralTrait;
    //
    public function register(Request $request)
    {

        $validator = Validator()->make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()){
            return Response()->json(['Error' => $validator->errors()]);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken('Auth Token')->accessToken;

        return response()->json(['user' => $user, 'token' => $token], 200);

    }
    public  function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provider credentials are incorrect']
            ]);
        }
        $accessToken = $user->createToken('Auth Token')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken]);
    }

    public function user (Request $request){
        return $request->user();
    }

}
