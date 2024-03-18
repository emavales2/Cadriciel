@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5">
    <!-- ---- * Placement of card component * ---- -->
    <div class="d-flex flex-column gap-4 align-items-center mb-8">
        <!-- ---- * CARD COMPONENT * ---- -->
        <article class="card col-md-6 p-5 border border-dark-subtle d-flex flex-column align-items-center gap-4">
            <header>
                <h2 class="section_title text-primary">{{ $etudiant->name }}</h2>
            </header>

            <div class="card-body">
                <p><strong>@lang('lang.email')</strong>: {{ $etudiant->etudiantHasUser->email }}</p>
                <p><strong>@lang('lang.phone')</strong>: {{ $etudiant->phone }}</p>
                <p><strong>@lang('lang.address')</strong>: {{ $etudiant->address }}</p>
                <p><strong>@lang('lang.city')</strong>: {{ $etudiant->etudiantHasVille->name }}</p>
                <p><strong>@lang('lang.birthdate')</strong>: {{ $etudiant->birthday }}</p>
            </div>
            
            <!-- ---- * Card footer * ---- -->
            <footer class="card-footer text-center pt-2 pb-4 border-top-0 d-flex gap-4 justify-content-center">
                <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-primary mb-4 hover_dk_blue">@lang('lang.edit_b')</a>

                <button type="button" class="btn btn-primary mb-4 hover_dk_blue" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    @lang('lang.delete_b')
                </button>

                <button class="btn btn-primary mb-4 hover_dk_blue">
                    <a class="nav-link text-light text-decoration-none fw-light" href="{{route('dashboard')}}">@lang('lang.cancel_b')</a>
                </button>      
            </footer>
        </article>
        <!-- ---- * END Card Component * ---- -->

        <!-- ---- * DELETE MODAL * ---- -->
        <!-- ---- * To confirm account deletion by user * ---- --> 
        <dialog class="bg-transparent modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <article class="modal-content">
                    <header class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.del_record_tit')</h1>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </header>

                    <p class="modal-body">
                    @lang('lang.del_rec_conf')
                    </p>

                    <footer class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.no_b')</button>
                        <form method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="@lang('lang.delete_b')" class="btn btn-danger">
                        </form>
                    </footer>
                </article>
            </div>
        </dialog>
        <!-- ---- * END Delete Modal * ---- -->
    </div>
</div>

@endsection