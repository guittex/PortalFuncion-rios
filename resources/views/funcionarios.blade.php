@extends('nav')

@section('content')

<html>
    <body>          
    <style>
    
    </style>
    
        <div class="content">
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
            <div class="row">
                <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Funcionários</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="card-category">tabela de funcionários</p>
                            </div>
                            <div class="col-md-9 colunaPesquisa">
                                <div style="float:right">
                                    <form class="form-inline" action="{{ route('funcionarios.pesquisar') }}">
                                        <div class="form-group mt-3">
                                            <p for="staticEmail2">Nome:</p>
                                        </div>
                                        <div class="form-group mx-sm-3">
                                            <input type="text" class="form-control" name="Nome" id="inputPassword2" required placeholder="Digite aqui...">
                                        </div>
                                        <button type="submit" class="btn btn-info">Pesquisar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>

                    <div class="card-body ">
                        <div class="row table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Setor</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Aniversário</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registro as $funcionario)

                                    <tr>
                                        <td>{{ $funcionario->Nome }}</td>
                                        <td>{{ $funcionario->Setor }}</td>
                                        <td>{{ $funcionario->Cargo }}</td>
                                        <?php  
                                            $date = new DateTime($funcionario->Data_Nascimento);
                                            $data =  $date->format('d-m-Y') ;
                                            /*$aniversarioMes = $date->format('m') ;
                                            @if($aniversarioMes == '5')

                                            @endif*/         
    
                                        ?>
                                        <td>{{ $data }}</td>     
                                    </tr>  
                                    @endforeach                                                                                      
                                </tbody>
                            </table>
                            @if(empty($_GET['Nome']))
                            <div class="row">
                                <div class="col-md-12">
                                    <div align="center">
                                        {!! $registro->links() !!}
                                    </div> 
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Atualizado em: {{ $ultimaAtualizacao }}
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        @endsection

