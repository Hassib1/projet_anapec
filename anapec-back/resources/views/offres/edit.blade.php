<!-- resources/views/offres/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Offre</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('offres.update', $offre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $offre->nom }}">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $offre->date }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $offre->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="type_contrat">Type de Contrat</label>
            <input type="text" name="type_contrat" class="form-control" value="{{ $offre->type_contrat }}">
        </div>

        <div class="form-group">
            <label for="formation">Formation</label>
            <input type="text" name="formation" class="form-control" value="{{ $offre->formation }}">
        </div>

        <div class="form-group">
            <label for="lieu_travail">Lieu de Travail</label>
            <input type="text" name="lieu_travail" class="form-control" value="{{ $offre->lieu_travail }}">
        </div>

        <div class="form-group">
            <label for="entreprise">Entreprise</label>
            <input type="text" name="entreprise" class="form-control" value="{{ $offre->entreprise }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
