<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <meta name="author" content="Guilherme Felipe de Oliveira" />

  <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('img/apple-icon.png') !!}">    <!--../assets/img/apple-icon.png"-->
  <link rel="icon" type="image/png" href="{!! asset('img/favicon.png') !!}"> <!--"../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <title>
    Portal Funcionários
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- CSS Files -->
  <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet" /> <!--"../assets/css/bootstrap.min.css"-->
  <link href="{!! asset('css/paper-dashboard.css?v=2.0.0') !!}" rel="stylesheet" /> <!--../assets/css/paper-dashboard.css?v=2.0.0 -->
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>
<style>
  .menuHover:hover{
    background:#cdcfdd;

  }
  
  .textHover:hover{
    color:black;
  }

  @media (max-width:500px){
    /*Dashboard*/
    .textDashboard{
      margin-top:30px;
    }
    
    /*Noticias*/
    .linhaFooter{
      text-align:center!important;
    }

    /*-------------------------------------------------*/

    /*Funcionario*/
    .colunaPesquisa{
      display:none;
    }

    .iconDisplay{
      display:inherit!important;
    }

    /*-------------------------------------------------*/

    


  }


</style>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{!! asset('img/logo.jpg') !!}">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          Olá !
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class='menuHover'>
            <a href="{{ route('dashboard')}}">
              <i class="nc-icon nc-bank iconHover"></i>
              <p class='textHover'>Dashboard</p>
            </a>
          </li>
          @if(Auth::check())
          <li class='menuHover'>
            <a href="{{ route('funcionarios')}}">
              <i class="nc-icon nc-single-02 iconHover"></i>
              <p class='textHover'>Funcionários</p>
            </a>
          </li>
          @endif
          <li class='menuHover'>
            <a href="{{ route('noticias')}}">
              <i class="nc-icon nc-paper iconHover"></i>
              <p class='textHover'>Notícias</p>
            </a>
          </li>
          <li class='menuHover'>
            <a href="{{ route('auditorias')}}">
              <i class="nc-icon nc-briefcase-24 iconHover"></i>
              <p class='textHover'>Auditorias</p>
            </a>
          </li>  
                    <!--
        
          <li class='menuHover'>
            <a href="./icons.blade.php">
              <i class="nc-icon nc-diamond iconHover"></i>
              <p class='textHover'>Icons</p>
            </a>
          </li>
          <li class='menuHover'>
            <a href="./map.blade.php">
              <i class="nc-icon nc-pin-3 iconHover"></i>
              <p class='textHover'>Maps</p>
            </a>
          </li>
          <li class='menuHover'>
            <a href="./notifications.blade.php">
              <i class="nc-icon nc-bell-55 iconHover"></i>
              <p class='textHover'>Notifications</p>
            </a>
          </li>
          <li class='menuHover'>
            <a href="./user.blade.php">
              <i class="nc-icon nc-single-02 iconHover"></i>
              <p class='textHover'>User Profile</p>
            </a>
          </li>
          <li class='menuHover'>
            <a href="./tables.blade.php">
              <i class="nc-icon nc-tile-56 iconHover"></i>
              <p class='textHover'>Table List</p>
            </a>
          </li>
          <li class='menuHover'>
            <a href="./typography.blade.php">
              <i class="nc-icon nc-caps-small iconHover"></i>
              <p class='textHover'>Typography</p>
            </a>
          </li>
        -->   
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Seja Bem Vindo  @if(Auth::check()){{ Auth::user()->name }}@endif</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="background: #dee2e6;">
          @if(Auth::check())

            <form class="form-inline" action="{{ route('funcionarios.pesquisar') }}">
              <div class="input-group no-border">
                <input type="text" value="" name="Nome" class="form-control" placeholder="Procurar cadastro...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <img src="{!! asset('/img/linha.png') !!}">
                    <button type="submit" style="border: none;background: none;"><i class="nc-icon nc-zoom-split" style='cursor:pointer;margin-left: 10px;'></i></button>
                  </div>
                </div>
              </div>
            </form>
          @endif
            <ul class="navbar-nav">              
              <li class="nav-item btn-rotate dropdown">
              @if(Auth::check())

                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-laptop"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Algumas ações</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <!--Rotas Protegidas -->
                  <a class="dropdown-item" data-toggle="modal" data-target="#adicionarNoticia"  href="#">Adicionar Notícia</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#adicionarAuditoria" href="#">Adicionar Auditoria</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#adicionarUsuario" href="#">Adicionar Usuário</a>
                </div>
              @endif

              </li>
              @if(Auth::check())
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#">
                  <i class="nc-icon nc-circle-10"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Conta</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" data-toggle="modal" data-target="#editarUsuario" href="#" >Editar Cadastro</a>
                  <a class='dropdown-item' href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Sair
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" id='logout' method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
              @else
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#">
                  <i class="nc-icon nc-circle-10"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Conta</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{route('login')}}">Entrar</a>                  
                </div>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  
  <canvas id="bigDashboardChart"></canvas>
  
  
</div> -->



@yield('content')


@extends('layouts.noticiaAdicionar')
@extends('layouts.auditoriaAdicionar')
@extends('layouts.usuarioEditar')
@extends('layouts.usuarioAdicionar')


@extends('scripts')



</body>

</html>