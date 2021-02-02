<?php

namespace App\Http\Controllers;

use App\Models\Identification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class IdentController extends Controller
{
    public function putident(Request $request){
        $i=Identification::where('cv_id',Session::get("cv_id")[0])->first();
        if($i)
            $identif=$i;
        else
            $identif=new Identification();

        if($request->user_image){
            $image_file=$request->user_image;
            $image = Image::make($image_file);
            Response::make($image->encode('jpeg'));
            $image->save('storage/user_image/'.$identif->id.'.jpeg');
            $identif->image=$image;
        }
        $identif->nom=$request->nom;
        $identif->prenom=$request->prenom;
        $identif->adresse=$request->adresse;
        $identif->email=$request->email;
        $identif->CodePostale=$request->CodePostale;
        $identif->ville=$request->ville;
        $identif->telephone=$request->telephone;
        $identif->DateDeNaissance=$request->dob;
        $identif->StatuMarital=$request->StatuMarital;
        $identif->PermisDeConduit=$request->PermisDeConduit;
        $identif->cv_id=Session::get("cv_id")[0];

        $result=$identif->save();
        if($result){
            return redirect()->route('export');
        }else{
            return back();
        }
    }
    public function getuserimage($id){
        if($id!=0){
            $ident=Identification::find($id);
            if($ident->image){
                $image = Image::make($ident->image);
                $res=Response::make($image->encode('jpeg'));
                $res->header('Content-Type','image/jpeg');
                return $res;

            }else{
                return redirect('/storage/profile.png');
            }
        }else{
            return redirect('/storage/profile.png');
        }

    }
    public function ident(){
        Session::push('cv_id',1);
        $ident=Identification::where('cv_id',Session::get("cv_id")[0])->first();
        if(!$ident)
            $ident=new Identification();

        return view('identification')->with(compact('ident'));
    }
}
