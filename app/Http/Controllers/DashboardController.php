<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{
    public function index()
    {

        // $token = $request->query('token');
    
        // try {
        //     JWTAuth::setToken($token)->authenticate();
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        // $user = Auth::user();
        return view('pages.dashboard');
    }
}
