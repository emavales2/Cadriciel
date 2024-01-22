<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FormController extends Controller {

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request) {
        
        //create () -> insert into .......
        // last inserted id ?
        // select * from... where Id = last inserted
       
        $newEtudiant = Etudiant::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'birthday'=> $request->birthday,
            'ville_id' => $request->ville_id,
        ]);

        $newUser = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'bpassword'=> $request->password
        ]);

        //return $newBlog;
        return redirect(route('etudiant.show', $newEtudiant->id))->withSuccess('Etudiant enregistré!');
    }



    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @param  \App\Models\User  $etudiant
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, Etudiant $etudiant, User $user) {
        
        $etudiant->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'birthday'=> $request->birthday,
            'ville_id' => $request->ville_id,
        ]);

        $user->update([
            'name' => $request->name,
            'email'=> $request->email,
        ]);

        return redirect(route('etudiant.show', $etudiant->id))->withSuccess('Etudiant mis a jour!');
    }
}