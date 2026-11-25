
<?php

class Conexao {

    private static $host = "127.0.0.1";
    private static $banco = "viby";
    private static $usuario = "root";
    private static $senha = "";

    public static function conectar() {

        try {

            $conexao = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$banco . ";charset=utf8mb4",
                self::$usuario,
                self::$senha
            );

            $conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $conexao;

        } catch (PDOException $erro) {

            die("Erro na conexão: " . $erro->getMessage());

        }
    }
}
