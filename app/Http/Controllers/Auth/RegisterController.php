<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
    }

    protected function validator(array $data)
    {
                   
    }

    protected function create(array $data)
    {
        $givenData = $data;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => md5($data['password']),
        ]);

    }

    public function register(Request $request)
    {
        $user = $this->create($request->all());

        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }







}
