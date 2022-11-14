<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * * Show Register/Create Form
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // user means folder name and register means file name
        return view('users.register'); 
    }

    /**
     * Store a newly created resource in storage.
     * * Create New User
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' =>  ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    /**
     * * Logout user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }
    
    /**
     * * Show Login Form
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('users.login');
    }

    /**
     * * Authenticate User
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' =>  ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
