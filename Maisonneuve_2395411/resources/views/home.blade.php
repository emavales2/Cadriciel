@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5">
    <section class="m-6 mb-10 d-flex flex-column gap-4">
        <header class="">
            <h1 class="text-center pt-5 fw-bold fs-4em text-primary">@lang('lang.welcome') !</h1>
        </header>
                    
        <p class="text-center text-secondary">@lang('lang.home_text_1')</p>    
    </section>   
</div>       

@endsection