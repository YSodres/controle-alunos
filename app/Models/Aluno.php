<?php

namespace ControleAlunos\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    const GENERO = [
        "Masculino" => "M",
        "Feminino" => "F"
    ];
}