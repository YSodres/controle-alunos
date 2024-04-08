<?php

namespace ControleAlunos\Models;

use Exception;

abstract class Model
{
    protected $attributes = [];
    public function __construct(array $attributes = [])
    {
        if (!empty($attributes)) {
            $this->setFromArray($attributes);
        }
    }

    public function setFromArray(array $data)
    {
        $newAttributes = array_merge($this->attributes, $data);
        foreach($newAttributes as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        throw new Exception("{$key} is not a valid property");
    }

    public function __set($key, $value)
    {
        return $this->attributes[$key] = $value;
    }
}
