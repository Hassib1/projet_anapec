<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function latest(Request $request)
    {
        $currentDate = $request->input('currentDate', date('Y-m-d'));

        $slides = Slide::whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->get();

        return response()->json(['slides' => $slides]);
    }

    public function index()
    {
        $slides = Slide::all();
        return view('slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate request data
    $request->validate([
        'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ]);

    $imagePath = null;

    // Handle file upload
    if ($request->hasFile('image_path')) {
        // Store the image in 'public/images' and get the path
        $imagePath = $request->file('image_path')->store('images', 'public');
    }

    // Create a new slide with the image path and other data
    $slide = Slide::create([
        'image_url' => $imagePath, // Make sure 'image_url' is set
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
    ]);

    // Redirect to index page with success message
    return redirect()->route('slides.index')->with('success', 'Slide created successfully.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
{
    // Validate the request data
    $request->validate([
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ]);

    // Check if a new image file has been uploaded
    if ($request->hasFile('image_path')) {
        // Delete the old image if it exists
        if ($slide->image_url) {
            Storage::disk('public')->delete($slide->image_url);
        }

        // Store the new image in 'public/images' and update the image_url
        $imagePath = $request->file('image_path')->store('images', 'public');
        $slide->image_url = $imagePath;
    }

    // Update the start_date and end_date fields
    $slide->start_date = $request->input('start_date');
    $slide->end_date = $request->input('end_date');

    // Save the changes to the slide
    $slide->save();

    // Redirect to the slides index page with a success message
    return redirect()->route('slides.index')->with('success', 'Slide updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        // Delete the associated image from storage
        if ($slide->image_path) {
            Storage::disk('public')->delete($slide->image_path);
        }

        // Delete the slide from the database
        $slide->delete();

        return redirect()->route('slides.index')->with('success', 'Slide deleted successfully.');
    }
}
