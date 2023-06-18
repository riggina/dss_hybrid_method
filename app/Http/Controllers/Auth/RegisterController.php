<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('pages.register');
    }
    public function _construct(){
        $this->middleware('auth',['except'=>'register']);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|string|email:dns|unique:users',
            'is_admin' => 'required|boolean',
            'password' => 'required|string|min:6|max:255',
        ]);
        if($validator->fails()){
            return response()->json($validator -> errors() ->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validate(),
            ['password'=>bcrypt($request->password)]
        ));

        return redirect('dashboard');

        return response()->json([
            'message'=>'User successfully registered',
            'user'=>$user
        ],201);
    }
}
