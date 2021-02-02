<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Competence;
use App\Models\CV_Collection;
use App\Models\Experimental;
use App\Models\Formation;
use App\Models\Identification;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportController extends Controller
{

    public function export(){

        $cvs=CV_Collection::all();

        return view('export')->with(compact('cvs'));
    }

    public function exporter($id){
        $templateproc=new TemplateProcessor("storage/CV/".str_replace("_","/",$id).".docx");
        $ident=Identification::where('cv_id',Session::get("cv_id")[0])->first();
        $competence=Competence::where('cv_id',Session::get("cv_id")[0])->first();
        $formation=Formation::where('cv_id',Session::get("cv_id")[0])->get();
        $experimental=Experimental::where('cv_id',Session::get("cv_id")[0])->get();

        if($ident){
            $templateproc->setImageValue('image_profile',array("path"=>"storage/user_image/".$ident->id.'.jpeg',"width"=>150,"height"=>170,"ratio"=>false));
            $templateproc->setValue('prenom',$ident->prenom);
            $templateproc->setValue('nom',$ident->nom);
            $templateproc->setValue('infos',$ident->adresse."                                ".$ident->email."                              ".$ident->CodePostale." ".$ident->ville."                                 ".$ident->telephone."                              ".$ident->DateDeNaissance."                           ".$ident->StatuMarital."                         ".$ident->PermisDeConduit);
        }else{
            $templateproc->setImageValue('image_profile','');
            $templateproc->setValue('prenom','');
            $templateproc->setValue('nom','');
            $templateproc->setValue('infos','');
        }
        if(!$competence){
            $templateproc->setValue('logicialtitre','');
            $templateproc->setValue('logiciels','');
            $templateproc->setValue('languetitre','');
            $templateproc->setValue('langues','');
            $templateproc->setValue('projetr','');
            $templateproc->setValue('projetsrealise','');
        }else{
            $templateproc->setValue('logicialtitre','logiciels');
            $templateproc->setValue('logiciels',$competence->logiciel);
            $templateproc->setValue('projetr','projets realisé');
            $templateproc->setValue('projetsrealise',$competence->ProjetRealiser);
            $templateproc->setValue('languetitre','langues');
            $templateproc->setValue('langues',$competence->langues);
        }



        if(count($formation)==0){
            $templateproc->setValue('formation','');
        }else{
            $templateproc->setValue('formation','FORMATION');
        }

        $annes="";
        foreach($formation as $anne){
            $annes=$annes.$anne->DateDebutDeFormation."                      ".$anne->DateFinFormation."                        ";
        }
        $templateproc->setValue('annes',$annes);
        $fors="";
        foreach($formation as $for){
            $fors=$fors.$for->Formation."                              ".$for->LieuFormation."                        ";
        }
        $templateproc->setValue('formations',$fors);


        if(count($experimental)==0){
            $templateproc->setValue('exper','');

        }else{
            $templateproc->setValue('exper','EXPERIENCES');
        }

        $annes="";
        foreach($experimental as $anne){
            $annes=$annes.$anne->DateDebut."                                   ".$anne->DateFin."                                        ";
        }
        $templateproc->setValue('date',$annes);
        $exs="";
        foreach($experimental as $ex){
            $exs=$exs.$ex->Societe."                                        ".$ex->Mission."                                   ".$ex->Duree."                                                  ";
        }
        $templateproc->setValue('nomentreprise',$exs);


        $templateproc->saveAs($ident->prenom." ".$ident->nom.".docx");

        $data = array(
            'id'      =>    $ident->id,
            'from'    =>    $ident->prenom." ".$ident->nom,
            'name'    =>    "recruteur"
        );

        Mail::to('email')->send(new SendMail($data));


        return response()->download($ident->prenom." ".$ident->nom.".docx")->deleteFileAfterSend(true);
    }

    public function getcv($id){
        $ident=Identification::where('cv_id',Session::get("cv_id")[0])->first();
        $competence=Competence::where('cv_id',Session::get("cv_id")[0])->first();
        $formation=Formation::where('cv_id',Session::get("cv_id")[0])->get();
        $experimental=Experimental::where('cv_id',Session::get("cv_id")[0])->get();
        if(!$ident){
            $ident=new Identification();
        }
        if(!$competence){
            $competence=new Competence();
        }
        return view('cv_html.1')->with(compact('ident','competence','formation','experimental'));
    }
}
