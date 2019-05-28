<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


use Datetime;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $registro = \App\Auditorias::paginate(10);

        return view('auditoria', compact('registro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $dataAtual = date('d-m-Y H:i'); 
        //App\Auditorias::create($request->all());

        $auditoria = new \App\Auditorias;
        $auditoria->titulo = $request->titulo;
        $auditoria->data = $request->data;
        $auditoria->objetivo = $request->objetivo;
        $auditoria->referencia = $request->referencia;
        $auditoria->usuarios = $request->usuarios;
        $auditoria->resposabilidades = $request->resposabilidades;
        $auditoria->descricao = $request->descricao;
        $auditoria->criado_por = Auth::user()->name;
        $auditoria->criado_em = $dataAtual;
        $auditoria->save();

        \Session::flash('flash_message',[
            'msg' => 'Cadastrado com sucesso',
            'class' => 'alert-success'
        ]);
        
        return redirect()->route('auditorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Auditorias::destroy($id);

        \Session::flash('flash_message',[
            'msg' => 'Apagado com sucesso',
            'class' => 'alert-success'
        ]);

        return redirect()->route('auditorias');

    }
}
