<?php
// 1. Informações do servidor e do banco
$host = "127.0.0.1";
$banco = "viby";
$usuario = "root";
$senha = "eueramaluco2313";

// 2. Tenta estabelecer a conexão
try {

    // 3. Cria a conexão usando PDO
    $conexao = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    // 4. Configura o tratamento de erros
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 5. Captura possíveis erros
} catch (PDOException $erro) {

    die("Erro na conexão: " . $erro->getMessage());

}
?>