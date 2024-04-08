<?php

namespace ControleAlunos\Models;

use ControleAlunos\Models\Model;

class Turma extends Model
{
    const NIVEL_ENSINO = [
        "Fundamental" => 1,
        "Médio" => 2
    ];

    const SERIE = [
        "1ª" => 1,
        "2ª" => 2,
        "3ª" => 3,
        "4ª" => 4,
        "5ª" => 5,
        "6ª" => 6,
        "7ª" => 7,
        "8ª" => 8,
        "9ª" => 9,
    ];

    const TURNO = [
        "Matutino" => 1,
        "Vespertino" => 2,
        "Noturno" => 3,
        "Integral" => 4,
    ];
}