<?php

require_once __DIR__ . "/../config/conexao.php";
require_once __DIR__ . "/../classes/Usuario.php";

class UsuarioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::conectar();
    }

    public function cadastrar(Usuario $usuario) {
        $sql = "INSERT INTO usuario (nome, email, telefone, senha)
                VALUES (:nome, :email, :telefone, :senha)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            ":nome" => $usuario->getNome(),
            ":email" => $usuario->getEmail(),
            ":telefone" => $usuario->getTelefone(),
            ":senha" => $usuario->getSenha()
        ]);
    }
    public function buscarPorEmail($email) {
    $sql = "SELECT id_usuario, nome, email, senha
            FROM usuario
            WHERE email = :email";

    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([":email" => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}