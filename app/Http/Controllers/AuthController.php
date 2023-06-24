<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function _construct(){
        $this->middleware('auth:api',['except'=>['login', 'register']]);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|string|email:dns|unique:users',
            'password' => 'required|string|min:6|max:255',
            'is_admin' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator -> errors() ->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validate(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'User successfully registered',
            'user'=>$user
        ],201);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|',
            'password' => 'required|string|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator -> errors(), 422);
        }
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function profile(){
        return response()->json(auth()->user());
    }
    public function logout(){
        auth()->logout();
        return response()->json([
            'message'=>'User logged out'
        ]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }
}
