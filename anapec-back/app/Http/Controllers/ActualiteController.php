<?php
namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ActualiteController extends Controller
{
    public function actualite(Request $request)
    {
        // Fetch all slides
        $actualite = Actualite::all();
        
        // Return JSON response with slides
        return response()->json([
            'actualite' => $actualite
        ]);
    }
    public function index()
    {
        $actualites = Actualite::all();
        return view('actualites.index', compact('actualites'));
    }
   public function show_one($id)
{
    // Utiliser findOrFail pour récupérer l'actualité ou retourner une erreur 404 si elle n'existe pas
    $actualite = Actualite::findOrFail($id);

    // Retourner l'actualité en format JSON
    return response()->json($actualite);
}

    public function create()
    {
        return view('actualites.create');
    }
    public function show_again(Request $request, $id)
    {
        $actualite = Actualite::findOrFail($id);
    
        return response()->json([
            'actualite' => $actualite,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        Actualite::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $path,
        ]);

        return redirect()->route('actualites.index')->with('success', 'Actualité a été ajoutée avec succès.');
    }

    public function show(Actualite $actualite)
    {
        return view('actualites.show', compact('actualite'));
    }

    public function edit(Actualite $actualite)
    {
        return view('actualites.edit', compact('actualite'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($actualite->image) {
                Storage::delete('public/' . $actualite->image);
            }
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = $actualite->image;
        }

        $actualite->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $path,
        ]);

        return redirect()->route('actualites.index')->with('success', 'Actualité a été modifiée avec succès.');
    }

    public function destroy(Actualite $actualite)
    {
        if ($actualite->image) {
            Storage::delete('public/' . $actualite->image);
        }
        $actualite->delete();
        return redirect()->route('actualites.index')->with('success', 'Actualité a été supprimée avec succès.');
    }
}
