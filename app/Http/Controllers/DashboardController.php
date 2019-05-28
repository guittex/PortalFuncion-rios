<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use DateTime;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getAtualizacao()
    {
        $ultimaAtualizacao = \App\FuncionariosModel::where('Recisao', NULL)->orderBy('Admissao','desc')->take(1)->get();

        $data = $ultimaAtualizacao[0]->Admissao;

        $date = new DateTime($data);

        $dataConvertida =  $date->format('d-m-Y');
        
        return $dataConvertida;

    }

    public function getProximaAuditoria(){

        $registro = \App\Auditorias::all();
        
        if(!empty($registro)){
            foreach($registro as $data ){
                if(count($registro) == 1){
                    $dataFinal = $registro[0]->data;
                    return $dataFinal;
                }
                $data = $data->data;
                $dataInt = strtotime($data);
                foreach($registro as $data2){
                    $data2 = $data2->data;
                    $dataInt2 = strtotime($data2);
                    if($dataInt < $dataInt2){
                        $dataFinal = date('d-m-Y',$dataInt);
                    }    
                }

            }
            if(!empty($dataFinal)){
                return $dataFinal;
            }
        }else{
            return '';
        }

    }

    public function getUltimaNoticia()
    {
        $ultimaNoticia = \App\Noticias::orderBy('id','desc')->take(1)->get();
        
        return $ultimaNoticia;
    }

    public function getQuantidadeNoticia(){
        $quantidadeNoticia = \App\Noticias::all();

        $quantidadeNoticia = count($quantidadeNoticia);

        return $quantidadeNoticia;
    }

    public function enviaDashboard(){

        $registro = \App\FuncionariosModel::where('Recisao', NULL)->where('fornecedor', 0)->where('Data_Nascimento',  '!=' , NULL)->orderBy('Nome')->get();

        $totalFuncionarios = count($registro);

        $dataConvertida = DashboardController::getAtualizacao();

        $ultimaNoticia = DashboardController::getUltimaNoticia();

        $quantidadeNoticia = DashboardController::getQuantidadeNoticia();

        $dataFinal = DashboardController::getProximaAuditoria();


        return view('/dashboard', compact('registro', 'totalFuncionarios', 'dataConvertida', 'ultimaNoticia', 'quantidadeNoticia','dataFinal'));
    }



}
