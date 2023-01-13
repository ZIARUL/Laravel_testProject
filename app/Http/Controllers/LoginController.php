<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('frontend.login');
        }
        
    }
    public function index()
    {
        return view('frontend.home');
    }
    public function register(){
        return view('frontend.registation');
    }
}
