@extends('nav')

@section('content')

<div class="content">

    <div class="row">   

    @if(Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div align='center' class="alert {{ Session::get('flash_message')['class'] }}">
                    {{ Session::get('flash_message')['msg'] }}
                </div>
            </div>
        </div>
    </div>
    @endif
        <div class="col-md-12">
            <div class=" ">
                <div class="row">
                    <div class="col-md-1">
                        <h1 class="card-title text-center">Auditorias</h1>
                    </div>
                    <!--<p class="card-category">Lorem ipun solum</p>-->
                    <hr/>
                    @if(Auth::check())

                    <div class="col-md-6 colunaPesquisa">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adicionarAuditoria"  style="float:right">Adicionar Auditoria</button>
                    </div>

                    @endif
                    <div class="col-md-6">
                        <img class='iconDisplay' src="{!! asset('img/noticiaAdicionarIcon.png') !!}" style="float:right;margin-left:15px;display:none">
                    </div>
                </div>
                <hr/>
            </div>
                @foreach($registro as $auditoria)

                <div class="card col-md-12">
                    <div class="card-header ">
                    <h4 class="card-title" style="font-weight:bold">{{ $auditoria->titulo}}</h4>                    
                    <p class="card-category" style="color:red;"><span>Data: </span>{{ $auditoria->data}}</p>

                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <!--<div class=" col-lg-6 col-md-5 col-sm-12">

                            <img src="{!! asset('img/bg5.jpg') !!}" width='400'>

                            </div>-->
                            <div class=" col-lg-12 col-md-7 col-sm-12">
                                <label style="font-size:14px;font-weight:bold;color:black">Objetivo:</label>
                                <p>
                                    {{ $auditoria->objetivo}}
                                </p>
                            </div>
                            <div class=" col-lg-12 col-md-7 col-sm-12">
                                <label style="font-size:14px;font-weight:bold;color:black">Referência:</label>
                                <p>
                                    {{ $auditoria->referencia}}
                                </p>
                            </div>
                            <div class=" col-lg-12 col-md-7 col-sm-12">
                                <label style="font-size:14px;font-weight:bold;color:black">Setores Destinado:</label>
                                <p>
                                    {{ $auditoria->usuarios}}
                                </p>
                            </div>
                            <div class=" col-lg-12 col-md-7 col-sm-12">
                                <label style="font-size:14px;font-weight:bold;color:black">Responsabilidades:</label>
                                <p>
                                    {{ $auditoria->resposabilidades}}
                                </p>
                            </div>
                            <div class=" col-lg-12 col-md-7 col-sm-12">
                                <label style="font-size:14px;font-weight:bold;color:black">Descrição:</label>
                                <p>
                                    {{ $auditoria->descricao}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Criado em: {{ $auditoria->criado_em }}
                            @if(Auth::check())
                                <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('auditoria.deletar', $auditoria->id)}}' : false)" class="btn btn-danger" style="float:right">Deletar</a>
                                
                            @endif                                                      
                        </div>
                    </div>
                </div>
                @endforeach      
        </div>
    </div>

</div>



@endsection