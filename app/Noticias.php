<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{

    protected $connection = 'sqlsrv';

    protected $table = 'noticia';


    protected $fillable = ['titulo', 'subTitulo', 'corpo'];
}
