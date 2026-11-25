
<?php

require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../classes/Estabelecimento.php";

class EstabelecimentoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function cadastrar(Estabelecimento $estabelecimento) {

        try {
            $this->conexao->beginTransaction();

            $sql = "INSERT INTO estabelecimento
                    (nome, descricao, telefone, email, cnpj, senha)
                    VALUES
                    (:nome, :descricao, :telefone, :email, :cnpj, :senha)";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([
                ":nome" => $estabelecimento->getNome(),
                ":descricao" => $estabelecimento->getDescricao(),
                ":telefone" => $estabelecimento->getTelefone(),
                ":email" => $estabelecimento->getEmail(),
                ":cnpj" => $estabelecimento->getCnpj(),
                ":senha" => $estabelecimento->getSenha()
            ]);

            $idEstabelecimento = $this->conexao->lastInsertId();

            $sqlEndereco = "INSERT INTO endereco (id_estabelecimento, rua)
                            VALUES (:id, :rua)";

            $stmtEndereco = $this->conexao->prepare($sqlEndereco);
            $stmtEndereco->execute([
                ":id" => $idEstabelecimento,
                ":rua" => $estabelecimento->getEndereco()
            ]);

            $relacionamentos = [
                [
                    "valores" => $estabelecimento->getCategorias(),
                    "tabela" => "categoria",
                    "campoId" => "id_categoria",
                    "relacao" => "estabelecimento_categoria"
                ],
                [
                    "valores" => $estabelecimento->getEstilos(),
                    "tabela" => "estilo",
                    "campoId" => "id_estilo",
                    "relacao" => "estabelecimento_estilo"
                ],
                [
                    "valores" => $estabelecimento->getCaracteristicas(),
                    "tabela" => "caracteristica",
                    "campoId" => "id_caracteristica",
                    "relacao" => "estabelecimento_caracteristica"
                ]
            ];

            foreach ($relacionamentos as $grupo) {
                foreach ($grupo["valores"] as $valor) {

                    $sqlBusca = "SELECT {$grupo['campoId']}
                                 FROM {$grupo['tabela']}
                                 WHERE nome = :nome";

                    $stmtBusca = $this->conexao->prepare($sqlBusca);
                    $stmtBusca->execute([":nome" => $valor]);
                    $id = $stmtBusca->fetchColumn();

                    if (!$id) {
                        $sqlInsere = "INSERT INTO {$grupo['tabela']} (nome)
                                      VALUES (:nome)";

                        $stmtInsere = $this->conexao->prepare($sqlInsere);
                        $stmtInsere->execute([":nome" => $valor]);
                        $id = $this->conexao->lastInsertId();
                    }

                    $sqlRelacao = "INSERT INTO {$grupo['relacao']}
                                   (id_estabelecimento, {$grupo['campoId']})
                                   VALUES (:idEstabelecimento, :id)";

                    $stmtRelacao = $this->conexao->prepare($sqlRelacao);
                    $stmtRelacao->execute([
                        ":idEstabelecimento" => $idEstabelecimento,
                        ":id" => $id
                    ]);
                }
            }

            $this->conexao->commit();
            return $idEstabelecimento;

        } catch (Throwable $erro) {
            if ($this->conexao->inTransaction()) {
                $this->conexao->rollBack();
            }
            throw $erro;
        }
    }

    public function buscarPorEmail($email) {
        $sql = "SELECT id_estabelecimento, nome, email, senha
                FROM estabelecimento
                WHERE email = :email";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([":email" => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT
                    e.id_estabelecimento,
                    e.nome,
                    e.descricao,
                    e.telefone,
                    e.email,
                    e.cnpj,
                    en.rua,
                    en.numero,
                    en.bairro,
                    en.cidade,
                    en.estado,
                    en.cep
                FROM estabelecimento e
                LEFT JOIN endereco en
                    ON e.id_estabelecimento = en.id_estabelecimento
                WHERE e.id_estabelecimento = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([":id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarCategorias($id) {
        return $this->buscarRelacionamentos(
            $id,
            "estabelecimento_categoria",
            "categoria",
            "id_categoria"
        );
    }

    public function buscarEstilos($id) {
        return $this->buscarRelacionamentos(
            $id,
            "estabelecimento_estilo",
            "estilo",
            "id_estilo"
        );
    }

    public function buscarCaracteristicas($id) {
        return $this->buscarRelacionamentos(
            $id,
            "estabelecimento_caracteristica",
            "caracteristica",
            "id_caracteristica"
        );
    }

    private function buscarRelacionamentos($id, $tabelaRelacao, $tabela, $campoId) {
        $sql = "SELECT t.nome
                FROM {$tabelaRelacao} r
                INNER JOIN {$tabela} t
                    ON r.{$campoId} = t.{$campoId}
                WHERE r.id_estabelecimento = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([":id" => $id]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function atualizar($id, $dados, $categorias, $estilos, $caracteristicas) {

        try {
            $this->conexao->beginTransaction();

            $sql = "UPDATE estabelecimento SET
                        nome = :nome,
                        descricao = :descricao,
                        telefone = :telefone,
                        email = :email,
                        cnpj = :cnpj
                    WHERE id_estabelecimento = :id";

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute([
                ":nome" => $dados["nome"],
                ":descricao" => $dados["descricao"],
                ":telefone" => $dados["telefone"],
                ":email" => $dados["email"],
                ":cnpj" => $dados["cnpj"],
                ":id" => $id
            ]);

            // Atualiza o endereço existente ou cadastra um novo.
            $sqlBuscaEndereco = "SELECT id_endereco
                                 FROM endereco
                                 WHERE id_estabelecimento = :id
                                 LIMIT 1";

            $stmtEndereco = $this->conexao->prepare($sqlBuscaEndereco);
            $stmtEndereco->execute([":id" => $id]);

            $idEndereco = $stmtEndereco->fetchColumn();

            if ($idEndereco) {
                $sqlEndereco = "UPDATE endereco
                                SET rua = :rua
                                WHERE id_endereco = :idEndereco";

                $stmtEndereco = $this->conexao->prepare($sqlEndereco);

                $stmtEndereco->execute([
                    ":rua" => $dados["endereco"],
                    ":idEndereco" => $idEndereco
                ]);

            } else {
                $sqlEndereco = "INSERT INTO endereco
                                (id_estabelecimento, rua)
                                VALUES (:id, :rua)";

                $stmtEndereco = $this->conexao->prepare($sqlEndereco);

                $stmtEndereco->execute([
                    ":id" => $id,
                    ":rua" => $dados["endereco"]
                ]);
            }

            $this->atualizarRelacionamentos(
                $id,
                $categorias,
                "categoria",
                "id_categoria",
                "estabelecimento_categoria"
            );

            $this->atualizarRelacionamentos(
                $id,
                $estilos,
                "estilo",
                "id_estilo",
                "estabelecimento_estilo"
            );

            $this->atualizarRelacionamentos(
                $id,
                $caracteristicas,
                "caracteristica",
                "id_caracteristica",
                "estabelecimento_caracteristica"
            );

            $this->conexao->commit();

            return true;

        } catch (Throwable $erro) {
            if ($this->conexao->inTransaction()) {
                $this->conexao->rollBack();
            }

            throw $erro;
        }
    }

    private function atualizarRelacionamentos(
        $id,
        $valores,
        $tabela,
        $campoId,
        $tabelaRelacao
    ) {

        $sqlExcluir = "DELETE FROM {$tabelaRelacao}
                       WHERE id_estabelecimento = :id";

        $stmtExcluir = $this->conexao->prepare($sqlExcluir);
        $stmtExcluir->execute([":id" => $id]);

        foreach ($valores as $valor) {

            $sqlBusca = "SELECT {$campoId}
                         FROM {$tabela}
                         WHERE nome = :nome";

            $stmtBusca = $this->conexao->prepare($sqlBusca);
            $stmtBusca->execute([":nome" => $valor]);

            $idOpcao = $stmtBusca->fetchColumn();

            if (!$idOpcao) {
                $sqlInsere = "INSERT INTO {$tabela} (nome)
                              VALUES (:nome)";

                $stmtInsere = $this->conexao->prepare($sqlInsere);
                $stmtInsere->execute([":nome" => $valor]);

                $idOpcao = $this->conexao->lastInsertId();
            }

            $sqlRelacao = "INSERT INTO {$tabelaRelacao}
                           (id_estabelecimento, {$campoId})
                           VALUES (:idEstabelecimento, :idOpcao)";

            $stmtRelacao = $this->conexao->prepare($sqlRelacao);

            $stmtRelacao->execute([
                ":idEstabelecimento" => $id,
                ":idOpcao" => $idOpcao
            ]);
        }
    }
}
