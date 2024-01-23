@extends('layouts.layout')
@section('content')

<div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
                            
    <form  method="post">
        @csrf
        <header class="text-center py-2 fw-bold fs-2em text-primary">
            Nouveau Compte Usager
        </header>

        <section class="d-flex flex-column gap-4 py-4">
            <article class="control-group col-12">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" class="form-control mt-2" placeholder="Name" value="{{old('name')}}">
            
                @if ($errors->has('name'))
                <div class="text-danger mt-2">
                    {{$errors->first('name')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="email">Courriel</label>
                <input type="email" id="email" name="email" class="form-control mt-2" placeholder="email" value="{{old('email')}}">

                @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{$errors->first('email')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="password">Mot de Passe</label>
                <input type="password" id="password" name="password" class="form-control mt-2" placeholder="password">

                @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{$errors->first('password')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="phone">No. Téléphone</label>
                <input type="tel" id="phone" name="phone" class="form-control mt-2" placeholder="phone">
            </article>

            <article class="control-group col-12">
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" class="form-control mt-2" placeholder="addresse">
            </article>
                            
            <article class="control-group col-12">
                    <label for="birthday">Date de Naissance</label>
                    <input type="date" id="birthday" name="birthday" class="form-control mt-2">
                </article>

            <article class="control-group col-12">
                <label for="ville">Ville</label>
                <select id="ville" name="ville_id" class="form-control mt-2">                    
                    <option value=null>Selectionnez une ville SVP</option> 
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->name }}</option>                       
                    @endforeach                    
                </select>
            </article>
        </section>
        
        <footer class="card-footer text-center pt-2">
            <input type="submit" value="Sauvegarder" class="btn btn-primary">
        </footer>
    </form>
</div> 

@endsection