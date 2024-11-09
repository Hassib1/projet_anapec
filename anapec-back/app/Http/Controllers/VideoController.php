<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function video(Request $request)
    {
        // Fetch all slides
        $video= Video::all();
        // Return JSON response with slides
        return response()->json([
            'videos' => $video
        ]);  
    }
    // Récupère toutes les vidéos
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }
    // Affiche une vidéo spécifique par ID (JSON)
    public function show_three($id)
    {
        $video = Video::findOrFail($id);
        return response()->json($video);
    }

    // Affiche la vue pour créer une nouvelle vidéo (vue)
    public function create()
    {
        return view('videos.create');
    }

    // Stocke une nouvelle vidéo dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,mov,avi|max:20000',
        ]);

        $path = $request->file('video')->store('videos', 'public');

        $video = Video::create([
            'title' => $request->title,
            'video_path' => $path,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully.');
    }

    // Affiche la vue pour éditer une vidéo existante (vue)
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    // Met à jour les informations d'une vidéo existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'nullable|file|mimes:mp4,mov,avi|max:20000',
        ]);

        $video = Video::findOrFail($id);

        if ($request->hasFile('video')) {
            // Supprimer l'ancien fichier vidéo
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }

            // Stocker le nouveau fichier vidéo
            $path = $request->file('video')->store('videos', 'public');
            $video->video_path = $path;
        }

        $video->title = $request->title;
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video updated successfully.');
    }

    // Supprime une vidéo spécifique
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Supprimer le fichier vidéo du stockage
        if ($video->video_path) {
            Storage::disk('public')->delete($video->video_path);
        }

        // Supprimer l'enregistrement de la base de données
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
    }
}
