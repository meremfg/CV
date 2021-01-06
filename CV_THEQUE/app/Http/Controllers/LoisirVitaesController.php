<?php

namespace App\Http\Controllers;

use App\Models\Loisir;
use Illuminate\Http\Request;

class LoisirVitaesController extends Controller
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
        return view('loisir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'centre_d_interet'    =>  'required',
            'cv_id'             =>  'required',

        ]);
        $loisir= new Loisir([
            'centre_d_interet'    =>  $request->get('centre_d_interet'),
            'cv_id'    =>  $request->get('cv_id'),

        ]);
        $loisir->save();
        return redirect()->route('loisir.index')->with('success', 'Données ajoutées');
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
        $loisir = Loisir::find($id);
        return view('loisir.edit', compact('loisir', 'id'));
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
        $this->validate($request, [
            'centre_d_interet'    =>  'required',
            'cv_id'             =>  'required'
        ]);
        $loisir = Loisir::find($id);
        $loisir->centre_d_interet = $request->get('centre_d_interet');
        $loisir->cv_id = $request->get('cv_id');
        $loisir->save();
        return redirect()->route('loisir.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loisir = Loisir::find($id);
        $loisir->delete();
        return redirect()->route('loisir.index')->with('success', 'Données supprimées');
    }
}
