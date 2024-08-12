<!DOCTYPE html>
<html>
<head>
    <title>Edit Slide</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Slide</h1>
        <!-- Ensure the route and slide variable are correct -->
        <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for update -->

            <!-- Existing Image Display -->
            <div class="form-group">
                <label for="existingImage">Existing Image:</label>
                <div>
                    <!-- Check the Storage URL and image path -->
                    <img src="{{ Storage::url($slide->image_url) }}" alt="{{ $slide->title }}" class="img-thumbnail" style="max-width: 200px;">
                </div>
            </div>

            <!-- Upload New Image -->
            <div class="form-group">
                <label for="newImage">New Image:</label>
                <input type="file" class="form-control-file" id="newImage" name="image_path">
            </div>

            <!-- Start Date -->
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $slide->start_date }}">
            </div>

            <!-- End Date -->
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $slide->end_date }}">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Slide</button>
            <a href="{{ route('slides.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <!-- Optional: Add Bootstrap JavaScript and dependencies if needed -->

</body>
</html>
