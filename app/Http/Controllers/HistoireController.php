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
                'user_id' => 'required',
                'scene_id' => 'required',
                'titre' => 'required',
                'commentaire' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        $histoire = new Histoire();

        $histoire->user_id = $request->user_id;
        $histoire->scene_id = $request->scene_id;
        $histoire->titre = $request->titre;
        $histoire->commentaire = $request->commentaire;

        $histoire->save();

        return redirect()->route('commentaires.index', ['titre' => "Commentaires"]);
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
