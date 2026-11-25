
<?php

class Cardapio {

    private $id;
    private $idEstabelecimento;
    private $nome;
    private $descricao;

    public function __construct($idEstabelecimento, $nome, $descricao) {
        $this->idEstabelecimento = $idEstabelecimento;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    public function getIdEstabelecimento() {
        return $this->idEstabelecimento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }
}
