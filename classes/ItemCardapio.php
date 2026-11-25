
<?php

class ItemCardapio {

    private $id;
    private $idCardapio;
    private $nome;
    private $descricao;
    private $preco;
    private $categoria;
    private $foto;
    private $disponivel;

    public function __construct(
        $idCardapio,
        $nome,
        $descricao,
        $preco,
        $categoria,
        $foto,
        $disponivel
    ) {
        $this->idCardapio = $idCardapio;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->foto = $foto;
        $this->disponivel = $disponivel;
    }

    public function getIdCardapio() {
        return $this->idCardapio;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getDisponivel() {
        return $this->disponivel;
    }
}
