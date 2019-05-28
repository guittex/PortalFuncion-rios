@extends('nav')

@section('content')
<?php  
  header('Content-type: text/html; charset=utf-8');    
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
  date_default_timezone_set('America/Sao_Paulo');
  
  $diaAtual = date('d-m-Y');
  $mesAtual = date('m');
  $anoAtual = date('Y');
  
  $mesAtualNome = strftime("%B", strtotime($diaAtual));
  
  
    
?>
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
          
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <img src="{!! asset('img/noticiasIcon.png') !!}">
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Notícias</p>
                      <p class="card-title">{{ $quantidadeNoticia}}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i> Ultima Notícia: {{ $ultimaNoticia[0]->criadoEm }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <img src="{!! asset('img/auditoriaIcon.png') !!}">
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Próxima Auditoria</p>
                      <p class="card-title" style="font-size:17px">
                      @if(!empty($dataFinal))
                        {{$dataFinal}}   
                      @else
                        Aguardando cadastro de Auditoria
                      @endif
                      <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i> Exemplo
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <img src="{!! asset('img/funcionarioIcon.png') !!}">
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Funcionários</p>
                      <p class="card-title">{{ $totalFuncionarios }}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fas fa-clock"></i> Atualizado em: {{ $dataConvertida }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          @foreach($ultimaNoticia as $noticia)
          <div class="card col-md-12">
              <div class="card-header ">
              <h5 class="card-title">Última Notícia</h5>
              <p class="card-category">{{ $noticia->titulo}}</p>
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
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Aniversáriantes do mês</h5>
                <p class="card-category">{{ $mesAtualNome }}</p>
              </div>
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Nome</th>
                      <th scope="col">Setor</th>
                      <th scope="col">Dia</th>
                    </tr>
                  </thead>
                  <tbody>  
                  @foreach($registro as $funcionario)
                  <?php  
                      $date = new DateTime($funcionario->Data_Nascimento);

                      $data =  $date->format('d-m');

                      $dataConvert =  $date->format('d-m');

                      $aniversarioMes = $date->format('m') ;

                      $setor = $funcionario->Setor;

                      $setor = substr($setor, 5);

                      $diasAtualNome = $dataConvert.'-'.$anoAtual;

                      $diasAtualNome = strftime("%A", strtotime($diasAtualNome))

                  ?>
                    <tr>
                    @if($aniversarioMes == $mesAtual)
                      <td>{{ $funcionario->Nome }}</td>
                      <td>{{ $setor }}</td> 
                      <td>{{ $data}} </td>   
                    @endif                  
                    </tr>    
                  @endforeach                
                  </tbody>
                </table>
              </div>
              <div class="card-footer">                
                <hr/>
                <div class="card-stats">
                  <i class="fa fa-check"></i> Lorem Ipsun
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row" style='padding:10px'>
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

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>

@endsection

