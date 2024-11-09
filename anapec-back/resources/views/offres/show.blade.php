<!-- resources/views/offres/show.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Détails de l'Offre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
               
                <a href="{{ route('offres.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
