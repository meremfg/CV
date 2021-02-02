<?php

namespace App\Http\Controllers;

use App\Models\Curriculum_Vitae;
use Illuminate\Http\Request;

class CurriculumVitaesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('curriculum_Vitae.create');
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
            'etudiant_cin'    =>  'required',

        ]);
        $curriculum_Vitae= new Curriculum_Vitae([
            'etudiant_cin'    =>  $request->get('etudiant_cin'),

        ]);
        $curriculum_Vitae->save();
        return redirect()->route('curriculum_Vitae.index')->with('success', 'Données ajoutées');
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
        $curriculum_Vitae = Curriculum_Vitae::find($id);
        return view('curriculum_Vitae.edit', compact('curriculum_Vitae', 'id'));
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
            'etudiant_cin'    =>  'required',
        ]);
        $curriculum_Vitae = Curriculum_Vitae::find($id);
        $curriculum_Vitae->etudiant_cin = $request->get('etudiant_cin');
        $curriculum_Vitae->save();
        return redirect()->route('$curriculum_Vitae.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum_Vitae = Curriculum_Vitae::find($id);
        $curriculum_Vitae->delete();
        return redirect()->route('curriculum_Vitae.index')->with('success', 'Données supprimées');
    }
}
