<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() 
    {
        return view("login");
    }
    public function loginSubmit(Request $request)
    {
        //form validation
        $request->validate(
            //rules
            [
                'email'=>'required|email',
                'password'=> 'required|min:7|max:10'
            ],
            //error message
            [
                'email.required' => 'O email é obrigatorio',
                'email.email' => 'Email tem que ser valído',
                'password.required' => 'A senha é obrigatória',
                'password.min'=> 'A senha deve conter pelo menos :min caracteres',
                'password.max'=> 'A senha deve conter pelo menos :max caracteres'
            ]
       );
       //get user input
       $email = $request->input('email');
       $password = $request->input('password');
      
       // check if user exits
       $user = User::where('email', $email)->where('deleted_at', Null)->first();
       if (!$user) {
        return redirect()
               ->back()
               ->withInput()
               ->with('loginError', 'Emial  ou senha incorretos');
       }
       echo '<pre></pre>';
       print_r($user);
    }
    public function logout()
    {
        echo "logout Viiew !!";
    }
}
