@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        @if($actualite->image)
            <img src="{{ asset('storage/' . $actualite->image) }}" class="card-img-top img-fluid" alt="{{ $actualite->titre }}" style="max-height: 300px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h1 class="card-title">{{ $actualite->titre }}</h1>
            <p class="card-text">{{ $actualite->contenu }}</p>
            <a href="{{ route('actualites.index') }}" class="btn btn-primary">Retour aux actualités</a>
        </div>
    </div>
</div>
@endsection
