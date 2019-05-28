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
                                <h1 class="card-title text-center">Notícias</h1>
                            </div>
                            <!--<p class="card-category">Lorem ipun solum</p>-->
                                <hr/>
                                <div class="col-md-6 colunaPesquisa">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adicionarNoticia"  style="float:right">Adicionar Notícia</button>
                                    
                                </div>
                                <div class="col-md-6">
                                    <img class='iconDisplay' src="{!! asset('img/noticiaAdicionarIcon.png') !!} " data-toggle="modal" data-target="#adicionarNoticia" style="float:right;margin-left:15px;display:none">
                                </div>
                                

                            </div>
                        </div>
                        <hr/>

                    </div>
                    @foreach($registro as $noticia)

                    <div class="card col-md-12">
                        <div class="card-header ">
                        <h5 class="card-title">{{ $noticia->titulo}}</h5>
                        <p class="card-category">{{ $noticia->subTitulo}}</p>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <!--<div class=" col-lg-6 col-md-5 col-sm-12">

                                <img src="{!! asset('img/bg5.jpg') !!}" width='400'>

                                </div>-->
                                <div class=" col-lg-12 col-md-7 col-sm-12">
                                <p>
                                    {{ $noticia->corpo}}
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i> Criado em: {{ $noticia->criadoEm }}
                                @if(Auth::check())
                                <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('noticias.deletar', $noticia->id)}}' : false)" class="btn btn-danger" style="float:right">Deletar</a>
                                <!--<img src="{!! asset('img/deletarIcon.png') !!}">-->
                                
                                @endif                              
                            </div>
                        </div>
                    </div>
                    @endforeach                   
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
            <div class="row">
                <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="https://webmail.fresadorasantana.com.br/" target="_blank">E-mail</a>
                    </li>
                    <li>
                        <a href="http://www.fresadorasantana.com.br/site/index.html" target="_blank">Site Fresadora</a>
                    </li>
                    <li>
                        <a href="http://192.168.1.214:8086/ramais/listar_ramais_modal.php" target="_blank">Ramais</a>
                    </li>
                </ul>
                </nav>
                <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                    document.write(new Date().getFullYear())
                    </script>, Fresadora Sant'ana
                </span>
                </div>
            </div>
            </div>
        </footer>
    </div>    
        
@endsection