<?php

namespace ControleAlunos\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $fillable = ['nome','endereco','situacao'];
}