<!-- resources/views/offres/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'Offre</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $offre->nom }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Date :</strong> {{ $offre->date }}</p>
            <p><strong>Description :</strong> {{ $offre->description }}</p>
            <p><strong>Type de Contrat :</strong> {{ $offre->type_contrat }}</p>
            <p><strong>Formation :</strong> {{ $offre->formation }}</p>
            <p><strong>Lieu de Travail :</strong> {{ $offre->lieu_travail }}</p>
            <p><strong>Entreprise :</strong> {{ $offre->entreprise }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('offres.edit', $offre->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="{{ route('offres.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
