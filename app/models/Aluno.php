<?php

namespace ControleAlunos\models\Aluno;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome','telefone','email','dataNascimento','genero','escola'];
}