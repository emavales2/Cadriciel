<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Article;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EtudiantController extends Controller {

    /** --------- * * CREATE, STORE sont dans CustAuthController.php. Pas d'INDEX pour les étudiants/users * * --------- **/

    /** -------------------- * * SHOW (Montre l'user cible) * * --------------------
     * 
     * Display the specified resource.
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response */

    // public function show($id) {
    public function show(Etudiant $etudiant) {
        
        // Verifier que l'etudiant signed in est le meme qui veut voir son profil
        if (auth()->check() && auth()->user()->id === $etudiant->id) {
            return view('etudiant.show', compact('etudiant'));
       
        } else {
            return redirect('dashboard')->with('error', 'Unauthorized access.');
        }
    }


    /** -------------------- * * EDIT (Formulaire pour modifier étudiant/user cible) * * --------------------
     * 
     * Show the form for editing the specified resource.
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response */

    public function edit(Etudiant $etudiant) {

        // Verifier que l'etudiant signed in est le meme qui veut editer son profil
        if (auth()->check() && auth()->user()->id === $etudiant->id) {
            $villes = Ville::all();
            return view('etudiant.edit', compact('etudiant', 'villes'));
       
        } else {
            return redirect('dashboard')->with('error', 'Unauthorized access.');
        }
    }


    /** -------------------- * * UPDATE (Stocke les données modifiées dans tables maisonn_etudiant et user) * * --------------------
     * 
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Etudiant $etudiant) {
        
        $etudiant->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone'=> $request->phone,
            'birthday'=> $request->birthday,
            'ville_id' => $request->ville_id,
        ]);

        $etudiant->etudiantHasUser->update([
            'email'=> $request->email
        ]);

        return redirect(route('etudiant.show', $etudiant->id))->withSuccess('Compte mis a jour!');
    }


    /** -------------------- * * DESTROY (Efface le record des tables maisonn_tudiant et user) * * --------------------
     * 
     * Remove the specified resource from storage.
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response */

    public function destroy(Etudiant $etudiant) {
        
        $etudiant->delete();
        $etudiant->etudiantHasUser->delete();

        return redirect(route('login'))->withSuccess('Compte effacé!');
    }



    public function query() {
        
        //select * from etudiants;
        //$etudiant = Etudiant::all();

        //$etudiant = Etudiant::Select('name', 'address', 'phone', 'email', 'birthday', 'ville_id')->get();
        
        //select * from etudiants orderby id desc limit 1;
        //$etudiant = Etudiant::Select()->orderby('id', 'desc')->first();

        //$etudiant = Etudiant::where('id', 1)->get();

        //select * from table where id = ?; // fetch
        // $etudiant = Etudiant::find(1);

        //select name, address, phone, email, birthday, ville_id from etudiants where name like 'a%'orderby name;

        //$etudiant = Etudiant::select('name', 'address', 'phone', 'email', 'birthday', 'ville_id')->where('name','like', 'Ville%')->orderby('name')->get();

        //AND - SELECT * FROM TABLE WHERE ville_id = 1 AND name like  '%te%';
        //$etudiant = Etudiant::select()->where('ville_id',1)->where('name', 'like', '%te%')->get();

        //OR
        //$etudiant = Etudiant::select()->where('ville_id',1)->orWhere('id', 4)->get();

        //INNER
        //Select * from etudiants INNER JOIN villes on ville_id = villes.id;
        $etudiant = Etudiant::select()
                        ->join('villes', 'ville_id','=','villes.id')
                        ->get();

        //OUTER
        //Select * from etudiants RIGHT OUTER JOIN users on ville_id = villes.id;
        $etudiant = Etudiant::select()
                        ->rightJoin('villes', 'ville_id','=','villes.id')
                        ->get();
        

        //$etudiant = Etudiant::select(name', 'address', 'phone', 'email', 'birthday', 'ville_id')->where('name', 'Ville')->orderby('name')->count();
        
        // $etudiant = Etudiant::max('id');

        //Raw Query
        // SELECT count(*) as etudiants, ville_id
        // FROM maisonn.etudiants
        // group by ville_id;

        // $etudiant = Etudiant::select(DB::raw('count(*) as blogs, id'))
        //     ->groupBy('id')
        //     ->get();

        $etudiant = Etudiant::find(1);

        return $etudiant->etudiantHasVille->name;
    }
}