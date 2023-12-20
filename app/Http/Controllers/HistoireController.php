<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HistoireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        printf($cat);
        printf($value==null);
        printf("cookie");
        if (!isset($cat)) {
            if (!isset($value)) {
                $histoires = Histoire::inRandomOrder()->get();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::where('genre_id', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $histoires = Histoire::inRandomOrder()->get();
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::where('genre_id', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $genres = \App\Models\Genre::distinct()->pluck("id");
        return view('accueil', ['histoires' => $histoires, 'cat' => $cat, 'genres' => $genres]);
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
        $histoire->photo = $request->photo;
        $histoire->genre_id = $request->genre_id;

        $histoire->save();
        if ($request->hasFile('media') && $request->file('media')->isValid()) {
            $file = $request->file('media');
            $base = 'histoire';
            $now = time();
            $nom = sprintf("%s_%d.%s", $base, $now, $file->extension());
            $file->storeAs('images/histoires/', $nom);
            $histoire->photo = 'images/histoires/' . $nom;
        }
        return redirect()->route('chapitre.create', ['histoire_id' => $histoire->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
