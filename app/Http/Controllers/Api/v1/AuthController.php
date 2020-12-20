<?php

namespace App\Http\Controllers\Api\v1;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $register = $request->validate([
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        $register['password'] = bcrypt($request->password);
        $user = User::create($register);
        $token = auth()->login($user);

        //$accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user ,'token' => $token]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            $user = auth()->user();
            //return $this->respondWithToken($token);
            return response()->json(['success' => true,'message'=>'Login success','token'=>$token], 200);
        }

        return response()->json(['success' => false,'message'=>'Invalid Credentials','token'=>null], 401);
    }

    public function user()
    {
        return response()->json($this->guard()->user(), 200);
    }

    public function user_update(Request $request){


        //app('log')->debug($avatar_url);

        $tokenFetch = JWTAuth::parseToken()->authenticate();
        $token = str_replace("Bearer ", "", $request->header('Authorization'));
        $user = JWTAuth::authenticate($request->token);
        //$user = $this->guard()->user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->type = $request->type;

        if($request->avatar == 'remove'){
            $user->avatar_url = null;
        }

        if($request->file('avatar')){
            $avatar_url = uploadImage($request->file('avatar'));
            $user->avatar_url = $avatar_url;
        }

        $user->save();
        return response()->json($this->guard()->user(), 200);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {

        //return response()->json(["access_token"=>"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMC4wLjIuMlwvZGlnaXppZ3NcL2FwaVwvdjFcL2F1dGhcL3JlZnJlc2giLCJpYXQiOjE2MDU1MDMwNTQsImV4cCI6MTYwNTU4OTk1MywibmJmIjoxNjA1NTAzNTUzLCJqdGkiOiJTeXhpR0lUejlhejdkUXpTIiwic3ViIjoxLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.viEl5HcIQf5Jm741MBF-uC2ZTPCf0KLviakZCTUjivA","token_type"=>"bearer","expires_in"=>86400]);
        $token = $this->respondWithToken($this->guard()->refresh());
        if($token){
            return $token;
        }else{
            return null;
        }
    }

    public function users()
    {
        return User::all();
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
