<!-- resources/views/actualites/index.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualités</title>
    <!-- Inclure les fichiers CSS ici (par exemple, Bootstrap) -->
</head>
<body>
    <div class="container">
        <h1>Actualités</h1>
        <div>
        <a href="{{ route('actualites.create') }}" class="btn btn-primary mb-3">Ajouter une Actualité</a>
        <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Accueil</a>
        <div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
      
        <div class="row">
            @foreach($actualites as $actualite)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        @if($actualite->image)
                            <img src="{{ asset('storage/' . $actualite->image) }}" class="card-img-top custom-image" alt="{{ $actualite->titre }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $actualite->titre }}</h5>
                            
                            <div class="mt-auto">
                                <a href="{{ route('actualites.show', $actualite->id) }}" class="btn btn-primary">Voir plus</a>
                                <a href="{{ route('actualites.edit', $actualite->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('actualites.destroy', $actualite->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .custom-card {
            height: 100%; /* Assure que toutes les cartes ont la même hauteur */
            display: flex;
            flex-direction: column;
        }
        .custom-card .card-img-top {
            height: 200px; /* Hauteur fixe pour les images à l'intérieur des cartes */
            object-fit: cover; /* Assure que les images couvrent toute la carte */
        }
    </style>
</body>
</html>
