<!-- resources/views/offres/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Offres</h1>
    <a href="{{ route('offres.create') }}" class="btn btn-primary">Créer une nouvelle offre</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date</th>
                <th>Type de Contrat</th>
                <th>Formation</th>
                <th>Lieu de Travail</th>
                <th>Entreprise</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offres as $offre)
                <tr>
                    <td>{{ $offre->nom }}</td>
                    <td>{{ $offre->date }}</td> 
                    <td>{{ $offre->type_contrat }}</td>
                    <td>{{ $offre->formation }}</td>
                    <td>{{ $offre->lieu_travail }}</td>
                    <td>{{ $offre->entreprise }}</td>
                    <td>
                        <a href="{{ route('offres.show', $offre->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('offres.edit', $offre->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
