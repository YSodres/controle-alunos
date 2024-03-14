<?php

namespace ControleAlunos\models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome','telefone','email','dataNascimento','genero','escola'];
}