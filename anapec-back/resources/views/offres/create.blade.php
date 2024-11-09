<!-- resources/views/offres/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Créer une Nouvelle Offre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Créer une Nouvelle Offre</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('offres.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="type_contrat">Type de Contrat</label>
                <input type="text" name="type_contrat" class="form-control" value="{{ old('type_contrat') }}">
            </div>

            <div class="form-group">
                <label for="formation">Formation</label>
                <input type="text" name="formation" class="form-control" value="{{ old('formation') }}">
            </div>

            <div class="form-group">
                <label for="lieu_travail">Lieu de Travail</label>
                <input type="text" name="lieu_travail" class="form-control" value="{{ old('lieu_travail') }}">
            </div>

            <div class="form-group">
                <label for="entreprise">Entreprise</label>
                <input type="text" name="entreprise" class="form-control" value="{{ old('entreprise') }}">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
