@extends('layouts.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form  method="post">
                    @csrf
                    <div class="card-header display-6 text-center">
                            Ajouter un/e étudiant/e
                    </div>

                    <div class="card-body">
                        <div class="control-group col-12">
                            <label for="name">Nom</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>

                        <div class="control-group col-12">
                            <label for="address">Adresse</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>

                        <div class="control-group col-12">
                            <label for="phone">No. Téléphone</label>
                            <input type="tel" id="phone" name="phone" class="form-control">
                        </div>

                        <div class="control-group col-12">
                            <label for="email">Courriel</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <div class="control-group col-12">
                            <label for="birthday">Date de Naissance</label>
                            <input type="date" id="birthday" name="birthday" class="form-control">
                        </div>

                        <div class="control-group col-12">
                            <label for="ville">Ville (MAKE DROPDOWN)</label>
                            <select id="ville" name="ville_id" class="form-control">

                                
                                    <option value=null>Please Select</option> 

                                    @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->name }}</option>                       
                                    @endforeach
                                
                            </select>
                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <input type="submit" value="Sauvegarder" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection