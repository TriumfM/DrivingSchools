<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\LoginRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        $credentials = request(['email', 'password']);

        if ($user != null && \Auth::attempt($credentials))
        {
            $user = $request->user();

            $tokenResult = $user->createToken('Driving School Token');

            return response()->json([

                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]
            );
        }

        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => ['email' => [ 'Email or password is invalid.' ] ]
        ], 403);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function details()
    {
        $user = Auth::user()->load('role');
        return $user;
    }
}
