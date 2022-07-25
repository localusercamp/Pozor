<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // OVERDOSE UNTYPED RESPONSE

    public function login(Request $request)
    {
        // REFACTOR DIRTY SHIT
        if(!Auth::attempt($request->only('email','password'))) {
            return response([
                'message' => 'Invalid credentials'
            ],Response::HTTP_UNAUTHORIZED);
        }
        /* REFACTORED EXAMPLE
        $credentails = $request->only('email','password');

        if (!auth()->attempt($credentails)) return response(
            ['message' => 'Invalid credentials'], 
            Response::HTTP_UNAUTHORIZED
        );
        */

        $user = Auth::user(); // REFACTOR FACADE USAGE WITH auth() HELPER

        $token = $user->createToken('token')->plainTextToken;

        // REFACTOR SPACES
        $cookie = cookie('jwt', $token, 60*24*7,'/',null,null,false); // valid 7 day

        // REFACTOR NOT PSR NEWLINES
        return response([
            'data' => new UserResource($user),
        ])->withCookie($cookie);
    }

    public function logout(Request $request)
    {

        $cookie = Cookie::forget('jwt');
        //$cookie = cookie('jwt', null);
        return response(['ok' => true])->withCookie($cookie);
        //Cookie::queue(Cookie::forget('jwt'));
        //return ['ok' => true];
    }

    public function getUser(Request $request)
    {
        //dd($request);
        return new UserResource(auth()->user());
    }
}
