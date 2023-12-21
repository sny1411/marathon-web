<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function create(Histoire $histoire)
    {
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createChap(Histoire $histoire)
    {
        return view('chapitres.create', ['histoire' => $histoire]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            ['titre' => 'required',
                'titreCourt' => 'required',
                'question' => 'required',
                'texte' => 'required'],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $chapitre = new Chapitre();
        $chapitre->titre = $request->titre;
        $chapitre->titrecourt = $request->titreCourt;
        $chapitre->texte = $request->texte;
        if ($request->premierTexte==null) {
            $chapitre->premier = 0;
        } else {
            $chapitre->premier = 1;
        }
        $chapitre->question = $request->question;
        $chapitre->histoire_id = $request->histoire;

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $nom = 'image';
            $now = time();
            $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

            $file->storeAs('images', $nom);
            $chapitre->media = 'images/'.$nom;
        }

        $chapitre->save();

        return redirect()->route('creaChapitre', $request->histoire);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chapitre = Chapitre::findOrFail($id);
        return view('chapitre', compact("chapitre"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function liaison(Request $request)
    {
        $src = Chapitre::find($request->source);
        $dest = Chapitre::find($request->destination);
        $src->suivants()->attach($dest->id, ['reponse'=>$request->reponse]);
        return redirect()->route('creaChapitre', ($src->histoire)->id);
    }

    public function activate($id){
        $histoire= Histoire::find($id);
        $histoire->active=1;
        $histoire->save();
        return redirect()->route('histoires.index');
    }
}
