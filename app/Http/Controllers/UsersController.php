<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
   public function validateToken($validationtoken)
    {
        $user = \DB::table('users')->where('activetoken', '=', $validationtoken)->update(array('active'=>1));
        return \Redirect::to('/profile')->with('message', 'conta ativada com sucesso.');
    }

    public function profile()
    {
        return view('profile');
    }
}
