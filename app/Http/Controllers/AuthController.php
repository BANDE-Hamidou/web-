<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //Register
    public function register()
    {
        return view('Auth/register');
    }

    public function login()
    {
        return view('Auth/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return to_route('Auth.login');
    }

    public function create_user(request  $request)
    {
        // Validation des donnees du formulaire
         $validation = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User;
        $user -> nom =   $validation['nom'];
        $user -> email =  $validation['email'];
        $user -> password =  Hash::make($validation['password']);
        $user -> remember_token = str::random();
        $user ->save();

        Auth::login($user);

        return redirect()->route('login')->with('success',  'Inscription reussie vous pouvez vous connecter');

    }

    public function logins(Request $request)
    {
        $verification = $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
        // Tentative de connexion
        if (Auth::attempt($verification)) {
            // Régénération de la session
            $request->session()->regenerate();

            // Redirection
            return redirect()->intended(route('annexes.index'));
        }
        // dd($verification);

        // Gestion des erreurs
        return back()->withErrors([
            'email' => "Les informations d'identification fournies ne correspondent pas à nos enregistrements.",
        ])->onlyInput('email');
    }


}
