<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EtudiantController extends Controller {
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index() {
        // $etudiants = Etudiant::all();

        // Utilise la pagination directement sur les résultats de l'index.
        $etudiants = Etudiant::orderBy('name')->paginate(20);

        return view('etudiant.index', compact('etudiants'));
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create() {
        
        $villes = Ville::all();
        return view('etudiant.create', compact('villes'));
    }


    /**
     * Store a newly created resource in storage.
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

        //return $newBlog;
        return redirect(route('etudiant.show', $newEtudiant->id))->withSuccess('Etudiant enregistré!');
    }


    /**
     * Display the specified resource.
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    public function show(Etudiant $etudiant) {
        //New Etudiant
        //$Etudiant = select * from etudiants where id = $Etudiant
        
        //return $Etudiant;
        return view('etudiant.show', compact('etudiant'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    public function edit(Etudiant $etudiant) {

        $villes = Ville::all();
        return view('etudiant.edit', compact('etudiant', 'villes'));
    }

    /**
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
            'email'=> $request->email,
            'birthday'=> $request->birthday,
            'ville_id' => $request->ville_id,
        ]);

        return redirect(route('etudiant.show', $etudiant->id))->withSuccess('Etudiant mis a jour!');
    }


    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    public function destroy(Etudiant $etudiant) {
        
        $etudiant->delete();

        return redirect(route('etudiant.index'))->withSuccess('Etudiant effacé!');
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

        // $etudiant = Etudiant::select(DB::raw('count(*) as blogs, user_id'))
        //     ->groupBy('user_id')
        //     ->get();

        $etudiant = Etudiant::find(1);

        return $etudiant->etudiantHasVille->name;

    }

}
