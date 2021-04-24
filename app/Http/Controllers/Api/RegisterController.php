<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 202);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $responseArr = [];
        $responseArr['token'] = $user->createToken('Api-token')->accessToken;
        $responseArr['name'] = $user->name;

        return response()->json($responseArr,200);
    }

    public function login(Request $request) {
        if (Auth::attempt([
            'email' => $request->email,
            'password' =>$request->password])){
            $user = Auth::user();
            $responseArr = [];
            $responseArr['token'] = $user->createToken('Api-token')->accessToken;
            $responseArr['name'] = $user->name;

            return response()->json($responseArr,200);

        } else {
            return response()->json(['error' => 'Вы не авторизованы'], 401);
        }
    }

}
