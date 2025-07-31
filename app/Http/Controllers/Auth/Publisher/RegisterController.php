<?php

namespace App\Http\Controllers\Auth\Publisher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.publisher.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Password::defaults()],
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'system_admin' => $request->system_admin,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->back();
    }
}
