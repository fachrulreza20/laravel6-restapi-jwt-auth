<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //return 'register';

        request()->validate([

            'username' => ['alpha_num','required', 'min:3','max:25','unique:users,username'],
            'name'     => ['string'],
            'email'    => ['email','required', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);


        User::create([

            'username' => request('username'),
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),


        ]);

        return response('Congrats. You Are Registered.');
    }
}
