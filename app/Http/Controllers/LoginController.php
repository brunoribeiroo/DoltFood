<?php

namespace cardapio\Http\Controllers;

use cardapio\User;
use Request;
use Auth;

class LoginController extends Controller
{
    public function form(){
    	return view('login/form_login');
    }
    public function novo(){
        return view('login/form_registro');
    }
    public function login(){
    	//credenciais
    	$credenciais=Request::only('login_user','password');


    	if(Auth::attempt($credenciais)){
    		return redirect('ingrediente/');
    	}else{    
    		return redirect('login/');
    	}
    }
    public function registro(){

        $dados=Request::only('login_user','password','login_email','login_tipo');

        //exit();

        User::create([
            'login_user' => $dados['login_user'],
            'login_email' => $dados['login_email'],
            'password' => bcrypt($dados['password']),
            'login_tipo'=>$dados['login_tipo'],
            ]);

       return 'teste';

    }
    public function LogOut(){

       Auth::logout();
        


        return redirect('/login');
    }

}
