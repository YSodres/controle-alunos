<?php

namespace ControleAlunos\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    const STATUS = [
        "ativo" => 1,
        "inativo" => 2
    ];
}