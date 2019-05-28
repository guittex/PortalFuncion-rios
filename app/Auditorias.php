<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditorias extends Model
{
    protected $connection = 'sqlsrv';

    protected $table = 'dbo.auditoria';
    
    public $timestamps = false;


    protected $fillable = [
        'titulo', 'data', 'objetivo', 'referencia' , 'usuarios', 'resposabilidades', 'descricao', 'criado_por','expira_em'
    ];
}
