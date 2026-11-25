
<?php

require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../classes/ItemCardapio.php";

class ItemCardapioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function cadastrar(ItemCardapio $item) {

        $sql = "INSERT INTO item_cardapio
                (id_cardapio, nome, descricao, preco, categoria, foto, disponivel)
                VALUES
                (:id_cardapio, :nome, :descricao, :preco, :categoria, :foto, :disponivel)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ":id_cardapio" => $item->getIdCardapio(),
            ":nome" => $item->getNome(),
            ":descricao" => $item->getDescricao(),
            ":preco" => $item->getPreco(),
            ":categoria" => $item->getCategoria(),
            ":foto" => $item->getFoto(),
            ":disponivel" => $item->getDisponivel()
        ]);

        return $this->conexao->lastInsertId();
    }

    public function listarPorCardapio($idCardapio) {

        $sql = "SELECT * FROM item_cardapio
                WHERE id_cardapio = :id_cardapio";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ":id_cardapio" => $idCardapio
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {

        $sql = "SELECT * FROM item_cardapio
                WHERE id_item = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([":id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, ItemCardapio $item) {

        $sql = "UPDATE item_cardapio SET
                nome = :nome,
                descricao = :descricao,
                preco = :preco,
                categoria = :categoria,
                foto = :foto,
                disponivel = :disponivel
                WHERE id_item = :id";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ":nome" => $item->getNome(),
            ":descricao" => $item->getDescricao(),
            ":preco" => $item->getPreco(),
            ":categoria" => $item->getCategoria(),
            ":foto" => $item->getFoto(),
            ":disponivel" => $item->getDisponivel(),
            ":id" => $id
        ]);
    }

    public function excluir($id) {

        $sql = "DELETE FROM item_cardapio
                WHERE id_item = :id";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([":id" => $id]);
    }
}
