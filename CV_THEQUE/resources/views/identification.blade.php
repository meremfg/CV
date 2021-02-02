@extends('layouts.app')

@section('content')



    <div class="container">


                <div class="card shadow-lg">
                    <ul class="tabs">
                        <li class="active">
                            <a id="step_1_link" class="no-cursor" data-next-step="1" data-href="/ident" href="/" title="Identification" onclick="return false;">
                                <i class="rnd-20">
                                    <span>1</span>
                                </i>
                                <br> Identification
                            </a>
                            <i class="overlay"></i>
                        </li>
                        <li class="mdl">
                            <a id="step_2_link" class="steplink" data-next-step="2" href="/contenu" title="Contenu">
                                <i class="rnd-20">
                                    <span>2</span>
                                </i>
                                <br> Contenu
                            </a>
                            <i class="overlay"></i>
                        </li>
                        <li class="last">
                            <a id="step_3_link" class="steplink" data-next-step="3" data-href="/export" href="/export" title="Export">
                                <i class="rnd-20"><span>3</span></i>
                                <br> Export</a>
                            <i class="overlay"></i>
                        </li>
                    </ul>
                    <div class="card-body bg-white">
                        <form action="{{route('putident')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-8" style="text-align: center;">
                                                <label for="user_image" style="padding:10px;padding-bottom:20px;padding-top:20px;background: #d0d0d0;margin-bottom: 0rem;border-radius: 15px;width: 65%">
                                                    <img class="user_img"  id="user_img" style="width: 100%;height: 100%" src="/getuserimage/@if($ident->id){{$ident->id}}@else 0 @endif"/>
                                                </label>
                                                <input hidden="true"  type="file" id="user_image" name="user_image" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nom">Nom<sup class="input-required">*</sup></label>
                                            <input type="text" class="form-control" id="nom"  name="nom" value="{{$ident->nom}}" required>
                                            <div class="invalid-feedback">STP entrez votre nom.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">prenom<sup class="input-required">*</sup></label>
                                            <input type="text" class="form-control" id="prenom"  name="prenom" value="{{$ident->prenom}}" required>
                                            <div class="invalid-feedback">STP entrez votre prenom.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="adresse">adresse</label>
                                            <input type="text" class="form-control" id="adresse"  name="adresse" value="{{$ident->adresse}}">

                                            <div class="invalid-feedback">STP entrez votre adresse.</div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">email<sup class="input-required">*</sup></label>
                                            <input type="email" class="form-control" id="email"  name="email" value="{{$ident->email}}" required>
                                            <div class="invalid-feedback">STP entrez votre email.</div>
                                        </div>

                                        <div class="form-group"style="display: inline-flex;mso-padding-between: 10px" >
                                            <div >
                                                <label for="CodePostale">Code Postale</label>
                                                <input type="number" class="form-control" id="CodePostale"  name="CodePostale" value="{{$ident->CodePostale}}">

                                                <div class="invalid-feedback">STP entrez votre Code Postale.</div>
                                            </div>
                                            <div style="margin-left: 12px" >
                                                <label for="ville">ville<sup class="input-required">*</sup></label>
                                                <input type="text" class="form-control" id="ville"  name="ville" value="{{$ident->ville}}" required>

                                                <div class="invalid-feedback">STP entrez votre ville.</div>
                                            </div>


                                        </div>

                                        <div class="form-group" >
                                            <label for="telephone">telephone<sup class="input-required">*</sup></label>
                                            <input type="text" class="form-control" id="telephone"  name="telephone" value="{{$ident->telephone}}" required>

                                            <div class="invalid-feedback">STP entrez votre telephone</div>
                                        </div>



                                        <div class="form-group">
                                            <label for="DateDeNaissance">Date De Naissance</label>
                                            <input  type="date" class="form-control" id="dob"  name="dob" value="{{$ident->DateDeNaissance}}" >

                                            <div class="invalid-feedback">STP entrez votre Date De Naissance.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="StatuMarital">Statu Marital</label>
                                            <input type="text" class="form-control" placeholder="par ex. : Célibataire" id="StatuMarital"  name="StatuMarital" value="{{$ident->StatuMarital}}">

                                            <div class="invalid-feedback">STP entrez votre Statu Marital.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="PermisDeConduit">Permis De Conduit</label>
                                            <input type="text" class="form-control" placeholder="par ex. :B, C" id="PermisDeConduit"  name="PermisDeConduit" value="{{$ident->PermisDeConduit}}" >

                                            <div class="invalid-feedback">STP entrez votre Permis De Conduit.</div>
                                        </div>
                                        <div class="mt-3" style="text-align: center;">
                                            <input type="submit" class="btn-blue-fill btn-next-step" style="width: 80%" value="Étape suivante">
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </form>

                    </div>

            </div>


    </div>
@endsection
