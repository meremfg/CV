<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
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
        return view('competence.create');
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
            'logiciel'    =>  'required',
            'ProjetRealiser'    =>  'required',
            'langues'    =>  'required',
            'cv_id'             =>  'required',

        ]);
        $competence= new Loisir([
            'logiciel'    =>  $request->get('logiciel'),
            'ProjetRealiser'    =>  $request->get('ProjetRealiser'),
            'langues'    =>  $request->get('langues'),
            'cv_id'    =>  $request->get('cv_id'),

        ]);
        $competence->save();
        return redirect()->route('competence.index')->with('success', 'Données ajoutées');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competence = Competence::find($id);
        return view('competence.edit', compact('competence', 'id'));
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
            'logiciel'    =>  'required',
            'ProjetRealiser'    =>  'required',
            'langues'    =>  'required',
            'cv_id'             =>  'required',

        ]);
        $competence = Competence::find($id);
        $competence->logiciel = $request->get('logiciel');
        $competence->ProjetRealiser = $request->get('ProjetRealiser');
        $competence->langues = $request->get('langues');
        $competence->cv_id = $request->get('cv_id');
        $competence->save();
        return redirect()->route('competence.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $competence = Competence::find($id);
        $competence->delete();
        return redirect()->route('competence.index')->with('success', 'Données supprimées');
    }
}
