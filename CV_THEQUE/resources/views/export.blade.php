@extends('layouts.app')

@section('content')



    <div class="container">


                <div class="card shadow-lg">
                    <ul class="tabs">
                        <li >
                            <a  id="step_1_link" class="no-cursor" data-next-step="1" data-href="/ident" href="/ident" title="Identification" >
                                <i class="rnd-20">
                                    <span><i class="fa fa-check"></i></span>
                                </i>
                                <br> Identification
                            </a>
                            <i class="overlay"></i>
                        </li>
                        <li class="mdl">
                            <a id="step_2_link" class="steplink" data-next-step="2" href="/contenu" title="Contenu">
                                <i class="rnd-20">
                                    <span><i class="fa fa-check"></i></span>
                                </i>
                                <br> Contenu
                            </a>
                            <i class="overlay"></i>
                        </li>
                        <li class="last active">
                            <a id="step_3_link" class="steplink" data-next-step="3" data-href="/export" href="/" title="Export" onclick="return false;">
                                <i class="rnd-20"><span>3</span></i>
                                <br> Export</a>
                            <i class="overlay"></i>
                        </li>
                    </ul>
                    <div class="card-body" >
                        <div id="form" class="step_3">
                            <form id="step_3" >
                                <div class="center cv-examples">
                                    <ul class="select-cv" style="text-align: center">
                                        <h1>
                                            Choisissez votre design et votre couleur :
                                        </h1>
                                        @foreach($cvs as $cv)
                                            <li class="which_cv_template" style="margin-top: 30px;margin-bottom: 30px">
                                                <div class="controller" style="z-index: 9;">
                                                    <div class="cv-color-picker" style="opacity: 0; top: -10000px;">
                                                        <div class="cv-color-picker-label">Quelle couleur ?</div>
                                                        <span> <i class="colorpicker rnd-10 active"  data-id="{{$cv->id}}_1" data-hex="#0071C1" data-color="blue" style="background:#0071C1;">
                                                    <i class="circle "></i></i> </span>
                                                        <span>
                                                <i class="colorpicker rnd-10" data-id="{{$cv->id}}_2" data-hex="#86b48f" data-color="turquoise" style="background:#86b48f;">
                                                    <i class="circle "></i></i>
                                            </span>
                                                        <span>
                                                <i class="colorpicker rnd-10" data-id="{{$cv->id}}_3" data-hex="#b45343" data-color="bordeaux" style="background:#b45343;">
                                                    <i class="circle "></i>
                                                </i>
                                            </span>
                                                        <span>
                                                <i class="colorpicker rnd-10" data-id="{{$cv->id}}_4" data-hex="#96795d" data-color="brown" style="background:#96795d;">
                                                    <i class="circle "></i></i>
                                            </span> </div> </div>
                                                <div style="position: relative; opacity: 1; border-color: rgb(67, 82, 112);" id="layout_id_{{$cv->id}}" class="template template_{{$cv->id}}  thumb-loaded" data-layout-id="{{$cv->id}}" data-cv="{{$cv->id}}" >
                                                    <div class="image-holder" >
                                                        <img src="/storage/CV/{{$cv->id}}/1.jpg" >
                                                        <i class="hover" style="opacity: 0;"></i></div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <input id="exporter" class="btn-blue-fill btn-next-step" type="submit" value="Exporter" style="width: 40%">
                            </form>
                        </div>
                    </div>

            </div>

    </div>
@endsection
