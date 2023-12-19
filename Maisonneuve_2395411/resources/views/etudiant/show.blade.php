@extends('layouts.layout')
@section('content')

  <div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">      
    <header class="m-5 mt-0">
        <h2 class="text-center fw-bold fs-3em text-primary">{{ $etudiant->name }}</h2>
    </header>
    <section>
      <p><strong>Email :</strong>{{ $etudiant->email }}</p>
      <p><strong>No. Téléphone:</strong>{{ $etudiant->phone }}</p>
      <p><strong>Adresse :</strong>{{ $etudiant->address }}</p>
      <p><strong>Ville :</strong>{{ $etudiant->etudiantHasVille->name }}</p>
      <p><strong>Date de Naissance :</strong>{{ $etudiant->birthday }}</p>
    </section>
    
    <aside class="d-flex flex-row gap-5 pt-4">
      <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary">Modifier</a>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Effacer
      </button>        
    </aside>
  </div>
  

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <article class="modal-content">
        <header class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer la donnée</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </header>

        <p class="modal-body">
        Etes-vous sûr de efffacer la donnée?
        </p>

        <footer class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
          <form method="post">
              @csrf
              @method('delete')
              <input type="submit" value="Effacer" class="btn btn-danger">
          </form>
        </footer>

      </article>
    </div>
  </div>
  @endsection