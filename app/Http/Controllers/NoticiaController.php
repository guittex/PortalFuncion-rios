<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use DateTime;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registro = \App\Noticias::all();

        return view('noticias', compact('registro'));
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

        $registro = DB::connection('sqlsrv')->insert("insert into noticia (Titulo,subTitulo,corpo, criadoEm) values('$request->titulo', 
        '$request->subTitulo', '$request->corpo', '$dataAtual')  ");

        \Session::flash('flash_message',[
            'msg' => 'Adicionado com sucesso',
            'class' => 'alert-success'
        ]);

        return redirect()->route('noticias');
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
        $delete = \App\Noticias::destroy($id);

        if(!$delete){
            \Session::flash('flash_message',[
                'msg' => 'Problema ao deletar',
                'class' => 'alert-danger'
            ]);
        }

        \Session::flash('flash_message',[
            'msg' => 'Apagado com sucesso',
            'class' => 'alert-success'
        ]);


        return redirect()->route('noticias');
    }
}
