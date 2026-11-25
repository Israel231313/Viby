
<?php

require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../classes/Cardapio.php";

class CardapioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function cadastrar(Cardapio $cardapio) {

        $sql = "INSERT INTO cardapio
                (id_estabelecimento, nome, descricao)
                VALUES (:id_estabelecimento, :nome, :descricao)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ":id_estabelecimento" => $cardapio->getIdEstabelecimento(),
            ":nome" => $cardapio->getNome(),
            ":descricao" => $cardapio->getDescricao()
        ]);

        return $this->conexao->lastInsertId();
    }

    public function listarPorEstabelecimento($idEstabelecimento) {

        $sql = "SELECT * FROM cardapio
                WHERE id_estabelecimento = :id_estabelecimento";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ":id_estabelecimento" => $idEstabelecimento
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {

        $sql = "SELECT * FROM cardapio
                WHERE id_cardapio = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([":id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $idEstabelecimento, $nome, $descricao) {

        $sql = "UPDATE cardapio
                SET nome = :nome,
                    descricao = :descricao
                WHERE id_cardapio = :id
                AND id_estabelecimento = :id_estabelecimento";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ":nome" => $nome,
            ":descricao" => $descricao,
            ":id" => $id,
            ":id_estabelecimento" => $idEstabelecimento
        ]);
    }

    public function excluir($id, $idEstabelecimento) {

        $sql = "DELETE FROM cardapio
                WHERE id_cardapio = :id
                AND id_estabelecimento = :id_estabelecimento";

        $stmt = $this->conexao->prepare($sql);

        return $stmt->execute([
            ":id" => $id,
            ":id_estabelecimento" => $idEstabelecimento
        ]);
    }
}
