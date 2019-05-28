<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\DB;


class FuncionariosController extends Controller
{
    public $teste;

    public function __construct()
    {
        
        $this->middleware('auth');

    }


    public function getFuncionarios()
    {
        $registro = \App\FuncionariosModel::where('Recisao', NULL)->where('fornecedor', 0)->where('Nome', 'NOT like' , '*AFASTADO*%')->where('Data_Nascimento',  '!=' , NULL)->orderBy('Nome')->paginate(12);
        
        $dashboard = new DashboardController;

        $ultimaAtualizacao = $dashboard->getAtualizacao();

        return view('funcionarios', compact('registro', 'ultimaAtualizacao'));
    }

    public function pesquisaFuncionario(Request $request)
    {
        
        $nome = $request->Nome;

        if($nome == null){
            \Session::flash('flash_message',[
                'msg' => 'Necessário digitar um nome',
                'class' => 'alert-danger'
            ]);

            return redirect()->route('funcionarios');

        }
        $registro = DB::connection('another')->select("select * from dbo.TAB_Funcionarios where Nome like '$nome%' and Recisao is NULL ");

        $dashboard = new DashboardController;

        $ultimaAtualizacao = $dashboard->getAtualizacao();

        return view('funcionarios', compact('registro', 'ultimaAtualizacao'));
    }
}
