<?php

namespace ControleAlunos\models\Turma;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['ano','nivelEnsino','serie','turno','escola'];
}