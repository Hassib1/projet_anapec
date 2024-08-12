<!-- resources/views/actualites/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une actualité</h1>
    <form action="{{ route('actualites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
