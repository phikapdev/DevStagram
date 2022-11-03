<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $resquest){

        $this->validate($resquest, [
            'email' => ['required', 'email' ],
            'password' => ['required']
        ]);

        if(!auth()->attempt($resquest->only('email', 'password'), $resquest->remember)){
            return back()->with('mensaje', 'Credenciales Inconrrectas');
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
