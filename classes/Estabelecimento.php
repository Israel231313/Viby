<?php

class Estabelecimento {

    private $id;
    private $nome;
    private $descricao;
    private $telefone;
    private $email;
    private $cnpj;
    private $senha;
    private $endereco;
    private $categorias;
    private $estilos;
    private $caracteristicas;

    public function __construct(
        $nome,
        $descricao,
        $telefone,
        $email,
        $cnpj,
        $senha,
        $endereco,
        $categorias,
        $estilos,
        $caracteristicas
    ) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cnpj = $cnpj;
        $this->senha = $senha;
        $this->endereco = $endereco;
        $this->categorias = $categorias;
        $this->estilos = $estilos;
        $this->caracteristicas = $caracteristicas;
    }

    public function getNome() { return $this->nome; }
    public function getDescricao() { return $this->descricao; }
    public function getTelefone() { return $this->telefone; }
    public function getEmail() { return $this->email; }
    public function getCnpj() { return $this->cnpj; }
    public function getSenha() { return $this->senha; }
    public function getEndereco() { return $this->endereco; }
    public function getCategorias() { return $this->categorias; }
    public function getEstilos() { return $this->estilos; }
    public function getCaracteristicas() { return $this->caracteristicas; }
}