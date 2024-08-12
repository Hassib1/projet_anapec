<!DOCTYPE html>
<html>
<head>
    <title>Slides</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="mb-3">
            <a href="{{ route('slides.create') }}" class="btn btn-primary">Add New Slide</a>
        </div>
        <div class="row">
            @foreach ($slides as $slide)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        <img src="{{ Storage::url($slide->image_url) }}"  class="card-img-top custom-image">
                        <div class="card-body">
                            
                            <p class="card-text">
                                <strong>Start Date:</strong> {{ $slide->start_date ?? 'N/A' }}<br>
                                <strong>End Date:</strong> {{ $slide->end_date ?? 'N/A' }}
                            </p>
                            <!-- Edit Button -->
                            <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-outline-dark btn-sm mr-2">Edit</a>
                            <!-- Delete Form -->
                            <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Optional: Add Bootstrap JavaScript and dependencies if needed -->
  
</body>
</html>
