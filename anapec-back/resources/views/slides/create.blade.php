<!DOCTYPE html>
<html>
<head>
    <title>Create Slide</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Create Slide</h1>
        <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF Token for security -->

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image_path" required>
                @error('image_path')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Start Date -->
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- End Date -->
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
                @error('end_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Slide</button>
            <a href="{{ route('slides.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <!-- Optional: Add Bootstrap JavaScript and dependencies if needed -->
    
</body>
</html>
