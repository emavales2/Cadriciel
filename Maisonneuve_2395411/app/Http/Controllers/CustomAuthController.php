<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use App\Models\Etudiant;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller {
    
    /** -------------------- * * INDEX (Login page) * * --------------------
     * 
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response */
    
    public function index() {    
        return view('auth.login');
    }


    /** -------------------- * * CREATE (Formulaire pour creer étudiant/user) * * --------------------
     * 
     * Show the form for creating a new resource.
     *  @return \Illuminate\Http\Response */
    
    public function create() {    

        $villes = Ville::all();
        return view('auth.create', compact('villes'));    
    }


    /** -------------------- * * STORE (Stocke les données dans tables maisonn_etudiant et user) * * --------------------
     * 
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response */
    
     public function store(Request $request) {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        $etudiant = new Etudiant([
            'id' => $user->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'ville_id' => $request->ville_id,
        ]);
    
        // Save Etudiant and associate it with the User
        $etudiant->save();

        return redirect(route('login'))->withSuccess('Compte enregistré !');
    }


    /** -------------------- * * AUTHENTICATION (Valide le login et ouvre la session) * * --------------------
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response */
 
    public function authentication(Request $request) {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
            ]);

            $credentials = $request->only('email', 'password');

            if (!Auth::validate($credentials)):
                return redirect('login') -> withErrors(trans('auth.failed'));
            endif;

            $user = Auth::getProvider()->retrieveByCredentials($credentials);            
            Auth::login($user, $request->get('remember'));
            
            return redirect()->intended('dashboard')->withSuccess('Signed in');
    }


    /** -------------------- * * LOGOUT (Detruit la session) * * --------------------
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response */

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}