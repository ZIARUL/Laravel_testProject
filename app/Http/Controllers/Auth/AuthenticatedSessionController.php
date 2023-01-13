<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{


    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        if (Auth::check()) {
            return redirect('/dashboard');
        } else {
            return view('auth.document-app-login');
        }
    }


     /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

       
                $request->authenticate();
                $request->session()->regenerate();
                $user_id = Auth::user()->id;
                $email = Auth::user()->email;
                return redirect('/dashboard');
           
    }









        /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
