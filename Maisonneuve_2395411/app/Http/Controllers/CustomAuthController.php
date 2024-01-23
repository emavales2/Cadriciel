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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        
        // return view('auth.create');
        $villes = Ville::all();
        return view('auth.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ]);
        
        $user = new User;
        // $user->fill($request->all());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $etudiant = new Etudiant;
        // $etudiant->fill($request->all());
        // $etudiant->save();
        $etudiant->name = $request->name;
        $etudiant->phone = $request->phone;
        $etudiant->address = $request->address;
        $etudiant->birthday = $request->birthday;
        $etudiant->ville_id = $request->ville_id;

        $user->etudiant()->save($etudiant);

        return redirect(route('login'))->withSuccess('Compte enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


     /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

     // Is this the equivalent of "show" i wonder?
    public function dashboard(User $user) {
        
        $name = 'Guest';

        if (Auth::check()) {
            $name = Auth::user()->name;
        }

        return view('blog.index', ['name' =>$name]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function logout() {

        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
