<?php
namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    //this is offre controller
    public function offre(Request $request)
    {
        // Fetch all slides
        $offre = Offre::all();
        
        // Return JSON response with slides
        return response()->json([
            'offres' => $offre
        ]);
    }
    public function index()
    {
        $offres = Offre::all();
        return view('offres.index', compact('offres'));
    }

    public function create()
    {
        return view('offres.create');
    }
    public function show_two($id)
    {
        $offre = Offre::findOrFail($id);
        return response()->json($offre);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'type_contrat' => 'required',
            'formation' => 'required',
            'lieu_travail' => 'required',
            'entreprise' => 'required',
        ]);
 
        Offre::create($request->all());
        return redirect()->route('offres.index')->with('success', 'Offre créée avec succès');
    }

    public function show(Offre $offre)
    {
        return view('offres.show', compact('offre'));
    }

    public function edit(Offre $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            'nom' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'type_contrat' => 'required',
            'formation' => 'required',
            'lieu_travail' => 'required',
            'entreprise' => 'required',
        ]);

        $offre->update($request->all());
        return redirect()->route('offres.index')->with('success', 'Offre mise à jour avec succès');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route('offres.index')->with('success', 'Offre supprimée avec succès');
    }
}
