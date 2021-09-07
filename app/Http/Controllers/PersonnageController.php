<?php

namespace App\Http\Controllers;
use App\Models\Personnage;
use Illuminate\Http\Request;

class PersonnageController extends Controller
{
    //Afficher les personnages
    public function index() {
        $personnages = Personnage::all();
        return view ('index', compact('personnages'));
    }

    //Afficher le formulaire
    public function create() {
        return view ('create');
    }

    //Enregistre le personnage dans la DB
    public function store(Request $request) { //appel de la classe puis création de l'objet
        $imageName = "";
        if ($request->image) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $newPersonnage = new Personnage;
        $newPersonnage->nom = $request->nom;
        $newPersonnage->image = '/images/' . $imageName;
        $newPersonnage->save();

        return redirect()->route('personnage.index')
                         ->with('success', 'Personnage enregistré !')
                         ->with('image', $imageName);

    }

    //Editer la fiche du personnage
    public function edit($id) {
        $personnage = Personnage::findOrFail($id);
        return view ('edit', compact('personnage'));
    }

    public function update(Request $request, $id) {
        $updatePersonnage = $request->validate([
            'nom' => 'required'
        ]);
        $updatePersonnage = $request->except(['_token', '_method']);

        if ($request->image) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $updatePersonnage['image'] = '/images/' . $imageName;
        }
        
        Personnage::whereId($id)->update($updatePersonnage);
        return redirect()->route('personnage.index')
                         ->with('success', 'Personnage modifié !');
    }

    //Supprimer un personnage
    public function destroy($id) {
        $personnage = Personnage::findOrFail($id);
        $personnage->delete();
        return redirect()->route('personnage.index')
                         ->with('success', 'Personnage supprimé !');
    }

}
