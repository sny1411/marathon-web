<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avis = Avis::all();
        return view('histoires.show', ['avis' => $avis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avis.create');
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
                'histoire_id' => 'required',
                'contenu' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        $avis = new Avis();

        $avis->user_id = $request->user_id;
        $avis->histoire_id = $request->histoire_id;
        $avis->contenu = $request->contenu;

        $avis->save();

        return redirect()->route('histoires.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $action = $request->query('action', 'show');
        $avis = Avis::find($id);
        return view('avis.show', ['avis' => $avis, 'action' => $action]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $avis = Avis::find($id);
        return view('avis.edit', ['avis' => $avis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $avis = Avis::find($id);

        $this->validate(
            $request,
            [
                'user_id' => 'required',
                'histoire_id' => 'required',
                'contenu' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        $avis = new Avis();

        $avis->user_id = $request->user_id;
        $avis->histoire_id = $request->histoire_id;
        $avis->contenu = $request->contenu;

        $avis->save();

        return redirect()->route('histoires.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->delete == 'valide') {
            $avis = Avis::find($id);
            $avis->delete();
        }
        return redirect()->route('histoires.show');
    }
}
