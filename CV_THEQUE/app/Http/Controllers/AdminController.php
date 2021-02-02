<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Recruteur;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function students()
    {
        $users = Etudiant::all();
        return view('admin.students.index', compact('users'));
    }

    public function createStudent()
    {
        return view('admin.students.create');
    }

    public function storeStudent()
    {
        $user = User::create([
            'name' => request('nom'),
            'email' => request('email'),
            'is_admin'=>'0',
            'password'=> bcrypt(request('password')),
        ]);
        $student = Etudiant::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'cin' => request('cin'),
            'cne' => request('cne'),
            'dateDeNaissance' => request('birthday'),
            'sexe' => request('sexe'),
            'user_id' => $user->id
        ]);

        return back()->with('message', 'Etudiant ajouté avec succes');
    }

    public function editStudent($cne)
    {
        $user = Etudiant::where('cne', $cne)->first();

        return view('admin.students.edit', compact('user'));
    }

    public function updateStudent()
    {
        $user = User::where('id', request('user_id'))->update([
            'name' => request('nom'),
            'email' => request('email'),
            'is_admin'=>'0',
            'password'=> bcrypt(request('password')),
        ]);
        $student = Etudiant::where('user_id', request('user_id'))->update([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'cin' => request('cin'),
            'cne' => request('cne'),
            'dateDeNaissance' => request('birthday'),
            'sexe' => request('sexe'),
        ]);

        return back()->with('message', 'Etudiant modifié avec succes');
    }

    public function destroyStudent($id)
    {
        $user = User::where('id', $id)->delete();
        $student = Etudiant::where('user_id', $id)->delete();

        return back()->with('message', 'Etudiant supprimmé avec succes');
    }

    public function recruteurs()
    {
        $users = Recruteur::all();
        return view('admin.recruteurs.index', compact('users'));
    }

    public function createRec()
    {
        return view('admin.recruteurs.create');
    }

    public function storeRec()
    {
        $user = User::create([
            'name' => request('nom'),
            'email' => request('email'),
            'is_admin'=>'0',
            'password'=> bcrypt(request('password')),
        ]);
        $rec = Recruteur::create([
            'user_id' => $user->id
        ]);

        return back()->with('message', 'Recruteurs ajouté avec succes');
    }

    public function editRec($id)
    {
        $user = Recruteur::where('id', $id)->first();

        return view('admin.recruteurs.edit', compact('user'));
    }

    public function updateRec()
    {
        $user = User::where('id', request('user_id'))->update([
            'name' => request('nom'),
            'email' => request('email'),
            'is_admin'=>'0',
            'password'=> bcrypt(request('password')),
        ]);

        return back()->with('message', 'Recruteur modifié avec succes');
    }

    public function destroyRec($id)
    {
        $user = User::where('id', $id)->delete();
        $rec = Recruteur::where('user_id', $id)->delete();

        return back()->with('message', 'Recruteur supprimmé avec succes');
    }
}
