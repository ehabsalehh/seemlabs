<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Models\User;
use App\Utilities\PassportProxy;
use Illuminate\Http\Response;

class UserAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $data['date'] = now();
        $user = User::create($data);

        if($token = $user->createToken('ehabsaleh123456')->accessToken)
            return response([ 'user' => $user, 'token' => $token]);

        return response()->json([
            'status' => Response::HTTP_FORBIDDEN,
            'message' => __('auth.failed')
        ], Response::HTTP_FORBIDDEN);

    }
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (!auth()->attempt($data)) {
            return response()->json([
                'status' => Response::HTTP_FORBIDDEN,
                'message' => __('auth.failed')
            ], Response::HTTP_FORBIDDEN);
        }
        $token = auth()->user()->createToken('ehabsaleh123456')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);

    }
}
