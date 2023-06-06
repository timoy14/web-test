<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (!$validator)
        {
            return response(['errors'=>$validator], 422);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $user = User::find(Auth::user()->id);
            $user->last_login = Carbon::now();
            $user->save();

            $token = Auth::user()->createToken('name');
            return response()->json(['token' => $token,'user'=>$user], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

   
}
