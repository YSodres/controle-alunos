<?php

namespace ControleAlunos\models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = ['nome','endereco','data_cadastro','situacao'];
}