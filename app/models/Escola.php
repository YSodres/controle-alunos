<?php

namespace ControleAlunos\Models;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    private $status = [
        "ativo" => "1",
        "inativo" => "2"
    ];

    public function getStatus($param)
    {
        return $this->status[$param];
    }
}