<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionariosModel extends Model
{
    protected $connection = 'another';
    protected $table = 'dbo.TAB_Funcionarios';
}
