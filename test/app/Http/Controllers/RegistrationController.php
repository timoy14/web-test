<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
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

        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->save();
        
        return response()->json(
            [
                "success" => true,
                "id" => $User->id,
            ]
        );
    }
}
