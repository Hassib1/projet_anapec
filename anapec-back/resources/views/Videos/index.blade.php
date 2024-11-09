<!DOCTYPE html>
<html>
<head>
    <title>Videos</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
      .custom-card {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.video-player-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
    width: 100%;
}

.video-player {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* Remove object-fit: cover; */
    object-fit: contain; /* Ensure video fits without cropping */
    transition: transform 0.3s ease; /* Optional: Smooth transition for scaling */
}

    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Videos</h1>
        <div class="mb-3">
            <a href="{{ route('videos.create') }}" class="btn btn-primary">Ajouter une Video</a>
            
            <a href="{{ route('home') }}" class="btn btn-secondary">Accueil</a>
        
        </div>
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        <div class="video-player-container">
                            <video class="video-player" controls>
                                <source src="{{ Storage::url($video->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title }}</h5>
                            <!-- Edit Button -->
                            <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-outline-dark btn-sm mr-2">Modifier</a>
                            <!-- Delete Form -->
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" class="d-inline">
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
</body>
</html>
