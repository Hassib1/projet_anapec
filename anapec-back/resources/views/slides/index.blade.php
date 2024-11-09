<!DOCTYPE html>
<html>
<head>
    <title>Slides</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .custom-card {
            height: 100%; /* Ensure all cards have the same height */
            display: flex;
            flex-direction: column;
        }
        .custom-card .card-img-top {
            height: 200px; /* Fixed height for images inside cards */
            object-fit: cover; /* Ensure images cover the entire card */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Slides</h1>

        <!-- Message de succès -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('slides.create') }}" class="btn btn-primary">Ajouter un Slide</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Accueil</a>
        </div>
        <div class="row">
            @foreach ($slides as $slide)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        <img src="{{ Storage::url($slide->image_url) }}"  class="card-img-top custom-image">
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Date de début:</strong> {{ $slide->start_date ?? 'N/A' }}<br>
                                <strong>Date de fin:</strong> {{ $slide->end_date ?? 'N/A' }}
                            </p>
                            <!-- Bouton Modifier -->
                            <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-outline-dark btn-sm mr-2">Modifier</a>
                            <!-- Formulaire de suppression -->
                            <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Script de confirmation -->
    <script>
        function confirmDelete() {
            return confirm('Êtes-vous sûr de vouloir supprimer ce slide ?');
        }
    </script>
</body>
</html>
