<?php

class Escola
{
    private int $id;
    private ?string $nome;
    private ?string $endereco;
    private DateTime $dataCadastro;
    private string $situacao;

    public function __construct(int $id, ?string $nome, ?string $endereco, DateTime $dataCadastro, string $situacao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->dataCadastro = $dataCadastro;
        $this->situacao = $situacao;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getDataCadastro(): DateTime
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro(DateTime $dataCadastro): void
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function getSituacao(): string
    {
        return $this->situacao;
    }

    public function setSituacao(string $situacao): void
    {
        $this->situacao = $situacao;
    }
}