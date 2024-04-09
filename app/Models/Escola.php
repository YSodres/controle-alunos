<?php

namespace ControleAlunos\Models;

use ControleAlunos\Models\Model;

class Escola extends Model
{
    const STATUS = [
        "Ativo" => 1,
        "Inativo" => 2
    ];
}