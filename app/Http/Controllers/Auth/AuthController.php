<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed|regex:^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]))^',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data_email = array(
            'name' => $data['name'],
            'validationToken' => md5($data['email'])
            );
        $fromEmail = 'contato@mytest.com';
        $fromName = 'Administração';
        Mail::send('auth.emails.validation', $data_email, function($message) use ($data, $fromName, $fromEmail)
        {
            $message->to($data['email'], $data['name']);
            $message->from($fromEmail, $fromName);
            $message->subject('Confirme sua conta');
        });
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'activetoken' => md5($data['email']),
            'password' => bcrypt($data['password']),
        ]);
    }
}
