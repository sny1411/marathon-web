<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HistoireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $histoires = Histoire::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::where('genre_id', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $histoires = Histoire::all();
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::where('genre_id', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $genres = \App\Models\Genre::distinct()->pluck("id");
        return view('histoires.index', ['histoires' => $histoires, 'cat' => $cat, 'genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('histoires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'titre' => 'required',
                'pitch' => 'required'
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $histoire = new Histoire();

        $histoire->titre = $request->titre;
        $histoire->pitch = $request->pitch;
        $histoire->genre_id = $request->genre_id;
        $histoire->active = 0;
        $histoire->user_id = Auth::user()->id;
        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $file = $request->file('document');
        } else {
            $msg = "Aucun fichier téléchargé";
            return redirect()->route('histoires.index')
                ->with('type', 'primary')
                ->with('msg', 'Smartphone non modifié ('. $msg . ')');
        }
        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($histoire->photo)) {
            Log::info("Image supprimée : ". $histoire->photo);
            Storage::delete($histoire->photo);
        }
        $histoire->photo = 'images/'.$nom;

        $histoire->save();
        return redirect()->route('creaChapitre', $histoire);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $histoire = Histoire::find($id);
        return view("histoires.show", ['histoire' => $histoire]);
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
}
