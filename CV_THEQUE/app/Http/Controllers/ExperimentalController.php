<?php

namespace App\Http\Controllers;

use App\Models\Experimental;
use Illuminate\Http\Request;

class ExperimentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experimental.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experimental= new Experimental([
            'DateDebut'    =>  $request->get('DateDebut'),
            'DateFin'    =>  $request->get('DateFin'),
            'Societe'    =>  $request->get('Societe'),
            'cv_id'    =>  $request->get('cv_id'),

        ]);
        $experimental->save();
        return redirect()->route('experimental.index')->with('success', 'Données ajoutées');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experimental = Experimental::find($id);
        return view('experimental.edit', compact('experimental', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $experimental = Experimental::find($id);
        $experimental->DateDebut = $request->get('DateDebut');
        $experimental->DateFin = $request->get('DateFin');
        $experimental->Societe = $request->get('Societe');
        $experimental->cv_id = $request->get('cv_id');
        $experimental->save();
        return redirect()->route('experimental.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experimental = Experimental::find($id);
        $experimental->delete();
        return redirect()->route('experimental.index')->with('success', 'Données supprimées');
    }
}
