<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
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
        return view('formation.create');
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
            'DateDebutDeFormation'    =>  'required',
            'DateFinFormation'             =>  'required',
            'Formation'             =>  'required',
            'LieuFormation'             =>  'required',
            'cv_id'             =>  'required',

        ]);
        $formation= new Formation([
            'DateDebutDeFormation'    =>  $request->get('DateDebutDeFormation'),
            'DateFinFormation'    =>  $request->get('DateFinFormation'),
            'Formation'    =>  $request->get('Formation'),
            'LieuFormation'    =>  $request->get('LieuFormation'),
            'cv_id'    =>  $request->get('cv_id'),

        ]);
        $formation->save();
        return redirect()->route('formation.index')->with('success', 'Données ajoutées');
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
        $formation = Formation::find($id);
        return view('formation.edit', compact('formation', 'id'));
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
            'DateDebutDeFormation'    =>  'required',
            'DateFinFormation'             =>  'required',
            'Formation'             =>  'required',
            'LieuFormation'             =>  'required',
            'cv_id'             =>  'required',

        ]);
        $formation = Formation::find($id);
        $formation->DateDebutDeFormation = $request->get('DateDebutDeFormation');
        $formation->DateFinFormation = $request->get('DateFinFormation');
        $formation->Formation = $request->get('Formation');
        $formation->LieuFormation = $request->get('LieuFormation');
        $formation->cv_id = $request->get('cv_id');
        $formation->save();
        return redirect()->route('formation.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return redirect()->route('formation.index')->with('success', 'Données supprimées');
    }
}
