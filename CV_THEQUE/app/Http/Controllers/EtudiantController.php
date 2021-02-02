<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $etudiants = Etudiant::all()->toArray();
        return view('etudiant.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiant.create');
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
            'cin'    =>  'required',
            'cne'     =>  'required',
            'nom'     =>  'required',
            'prenom'     =>  'required',
            'dateDeNaissance'     =>  'required',
            'sexe'     =>  'required',
            'user_id'     =>  'required',
        ]);
        $etudiant = new Student([
            'cin'    =>  $request->get('cin'),
            'cne'     =>  $request->get('cne'),
            'nom'     =>  $request->get('nom'),
            'prenom'     =>  $request->get('prenom'),
            'dateDeNaissance'     =>  $request->get('dateDeNaissance'),
            'sexe'     =>  $request->get('sexe'),
            'user_id'     =>  $request->get('user_id'),
        ]);
        $etudiant->save();
        return redirect()->route('etudiant.index')->with('success', 'Data Added');
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
        //
        $etudiant = Etudiant::find($id);
        return view('etudiant.edit', compact('etudiant', 'id'));
        
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
        //
        $this->validate($request, [
            'cin'    =>  'required',
            'cne'     =>  'required',
            'nom'     =>  'required',
            'prenom'     =>  'required',
            'dateDeNaissance'     =>  'required',
            'sexe'     =>  'required',
            'user_id'     =>  'required',
        ]);
        $etudiant = Etudiant::find($id);
        $etudiant->cin = $request->get('cin');
        $etudiant->cne = $request->get('cne');
        $etudiant->nom = $request->get('nom');
        $etudiant->prenom = $request->get('prenom');
        $etudiant->dateDeNaissance = $request->get('dateDeNaissance');
        $etudiant->sexe = $request->get('sexe');
        $etudiant->user_id = $request->get('user_id');
        $etudiant->save();
        return redirect()->route('etudiant.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success', 'Data Deleted');
    }
}
