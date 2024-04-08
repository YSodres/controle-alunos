<?php

namespace ControleAlunos\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    const STATUS = [
        "Ativo" => 1,
        "Inativo" => 2
    ];
}