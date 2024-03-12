@extends('layouts.layout')
@section('content')

    <div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">
                
        <form method="post">
            @method('put')
            @csrf
            <header class="text-center py-2 fw-bold fs-2em text-primary">
                Modifier les Coordonées
            </header>
            <section class="d-flex flex-column gap-4 py-4">
                <article class="control-group col-12">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control mt-2" value="{{ $etudiant->name}}">
                </article>

                <article class="control-group col-12">
                    <label for="address">Adresse</label>
                    <input type="text" id="address" name="address" class="form-control mt-2" value="{{ $etudiant->address}}">
                </article>

                <article class="control-group col-12">
                    <label for="phone">No. Téléphone</label>
                    <input type="tel" id="phone" name="phone" class="form-control mt-2" value="{{ $etudiant->phone}}">
                </article>

                <article class="control-group col-12">
                    <label for="email">Courriel</label>
                    <input type="email" id="email" name="email" class="form-control mt-2" value="{{ $etudiant->email}}">
                </article>

                <article class="control-group col-12">
                    <label for="birthday">Date de Naissance</label>
                    <input type="date" id="birthday" name="birthday" class="form-control mt-2" value="{{ $etudiant->birthday}}">
                </article>
                
                <article class="control-group col-12">
                    <label for="ville">Ville</label>
                    <select id="ville" name="ville_id" class="form-control mt-2">                    
                        <option value=null>Selectionnez une ville SVP</option> 
                        @foreach($villes as $ville)
                        <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>{{ $ville->name }}</option>                    
                        @endforeach                    
                    </select>
                </article>
            </section>

            <footer class="card-footer text-center pt-2">
                <input type="submit" value="Modifier" class="btn btn-primary">
            </footer>
        </form>            
    </div>
@endsection
