<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function __construct(){
    //     $this->middleware('guest');
    // }
    

    public function index(){
        return view('auth.login');
    }



    public function loginStore(Request $request)
    {
        // dd($request->remember);
        $this->validate($request, [
            'email'=>'required|max:255',
            'password' => 'required|max:255'
        ]);

        //login in user
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login Credentials');
        }

        return redirect()->route('dashboard');

        

          
    }

  
    //
}
