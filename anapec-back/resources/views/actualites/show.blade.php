<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $actualite->titre }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body><br>
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
</body>
</html>
