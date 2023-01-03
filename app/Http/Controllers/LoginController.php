<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $authUser = Users::where('username', '=', $request->username)->get();
        if (isset($authUser))
        {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            {
                $request->session()->regenerate();
                $usuario = Users::find(auth()->user()->_id);
                $usuario->token = Hash::make(date('Y-m-d H:i:s ').'-'.auth()->user()->name.'-'.auth()->user()->role);
                $usuario->save();
                return redirect()->intended('/personal');
            }
            else
            {
                return back()->withErrors([
                    'error' => 'Your credentials are invalid'
                ]);
            }
        }
        else
        {
            return back()->withErrors([
                'error' => 'The user does not exist'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user = Users::find(auth()->user()->_id);
        $user->token = null;
        $user->save();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
