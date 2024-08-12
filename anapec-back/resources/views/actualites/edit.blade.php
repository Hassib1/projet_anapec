<!-- resources/views/actualites/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier une actualité</h1>
    <form action="{{ route('actualites.update', $actualite->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $actualite->titre }}" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5" required>{{ $actualite->contenu }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if($actualite->image)
                <img src="{{ asset('storage/' . $actualite->image) }}" class="img-fluid mt-2" alt="{{ $actualite->titre }}">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
