<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Fablab;

class FablabController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_fablab' => 'required|string|max:255',
            'description_fablab' => 'required|string',
            'image_fablab' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fablab = new Fablab();
        $fablab->title = $validatedData['title_fablab'];
        $fablab->description = $validatedData['description_fablab'];
        $fablab->slug = Str::slug($fablab->title);

        // Gestion de l'image
        if ($request->hasFile('image_fablab')) {
            $imageFablab = $request->file('image_fablab');
            $filename = time() . '_' . $imageFablab->getClientOriginalName();

            // Déplacement de l'image dans le dossier public/storage/fablabs
            $imageFablab->move(public_path('storage/fablabs'), $filename);

            $fablab->image = $filename; // Sauvegarde du nom de fichier
        }

        $fablab->save();

        return redirect()->back()->with('success', 'Fablab ajouté avec succès.');
    }

    public function destroy(Fablab $fablab)
    {
        if ($fablab->image) {
            $imagePath = public_path('storage/fablabs/' . $fablab->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Suppression de l'image
            }
        }

        $fablab->delete();

        return redirect()->back()->with('success', 'Fablab supprimé avec succès.');
    }

    public function update(Request $request, Fablab $fablab)
    {
        $validatedData = $request->validate([
            'title_fablab' => 'required|string|max:255',
            'description_fablab' => 'required|string',
            'image_fablab' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fablab->title = $validatedData['title_fablab'];
        $fablab->description = $validatedData['description_fablab'];
        $fablab->slug = Str::slug($fablab->title);

        // Gestion de l'image
        if ($request->hasFile('image_fablab')) {
            // Suppression de l'ancienne image
            if ($fablab->image) {
                $oldImagePath = public_path('storage/fablabs/' . $fablab->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload de la nouvelle image
            $imageFablab = $request->file('image_fablab');
            $filename = time() . '_' . $imageFablab->getClientOriginalName();
            $imageFablab->move(public_path('storage/fablabs'), $filename);

            $fablab->image = $filename;
        }

        $fablab->save();

        return redirect()->back()->with('success', 'Fablab mis à jour avec succès.');
    }

    public function showFablabs(Request $request)
    {
        $fablabs = Fablab::paginate(3);

        if ($request->ajax()) {
            return view('front.achievements.achievements', compact('fablabs'));
        }

        return view('front.achievements.achievements', ['fablabs' => $fablabs]);
    }

    public function displayFablab(Fablab $fablabs)
    {
        return view('front.achievements.showFablab', ['fablabs' => $fablabs]);
    }
}
