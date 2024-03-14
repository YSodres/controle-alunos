<?php

namespace ControleAlunos\models\Escola;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = ['nome','endereco','dataCadastro','situacao'];
}