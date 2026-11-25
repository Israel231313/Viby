
<?php
session_start();

require_once __DIR__ . "/config/conexao.php";
$conexao = Conexao::conectar();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

$idUsuario = $_SESSION["id_usuario"];
$mensagem = "";
$tipoMensagem = "";

try {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nome = trim($_POST["nome"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $telefone = trim($_POST["telefone"] ?? "");

        if ($nome === "" || $email === "" || $telefone === "") {
            $mensagem = "Preencha todos os campos.";
            $tipoMensagem = "erro";

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagem = "Informe um e-mail válido.";
            $tipoMensagem = "erro";

        } else {

            $sql = "UPDATE usuario
                    SET nome = :nome,
                        email = :email,
                        telefone = :telefone
                    WHERE id_usuario = :id_usuario";

            $stmt = $conexao->prepare($sql);

            $stmt->execute([
                ":nome" => $nome,
                ":email" => $email,
                ":telefone" => $telefone,
                ":id_usuario" => $idUsuario
            ]);

            $_SESSION["nome_usuario"] = $nome;

            $mensagem = "Perfil atualizado com sucesso!";
            $tipoMensagem = "sucesso";
        }
    }

    $sql = "SELECT nome, email, telefone
            FROM usuario
            WHERE id_usuario = :id_usuario";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([":id_usuario" => $idUsuario]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        session_destroy();
        header("Location: login.php");
        exit;
    }

} catch (PDOException $erro) {

    if ($erro->getCode() === "23000") {
        $mensagem = "Este e-mail já está cadastrado.";
    } else {
        $mensagem = "Não foi possível atualizar os dados.";
    }

    $tipoMensagem = "erro";

    $sql = "SELECT nome, email, telefone
            FROM usuario
            WHERE id_usuario = :id_usuario";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([":id_usuario" => $idUsuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu perfil | Viby</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<main class="paginaCadastro">

    <a href="index.php" class="voltarInicio">← Voltar ao início</a>

    <div class="conteudoCadastro">

        <img src="img/logo.png" alt="Logo Viby" class="logoCadastro">

        <h1>Meu perfil</h1>

        <p>Gerencie suas informações pessoais.</p>

        <?php if ($mensagem !== ""): ?>
            <p class="mensagemPerfil <?= $tipoMensagem ?>">
                <?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="perfil.php" class="formularioCadastro">

            <h2 class="tituloGrupo">Meus dados</h2>

            <label for="nome">Nome completo</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="<?= htmlspecialchars($usuario["nome"], ENT_QUOTES, "UTF-8") ?>"
                required
            >

            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($usuario["email"], ENT_QUOTES, "UTF-8") ?>"
                required
            >

            <label for="telefone">Telefone</label>
            <input
                type="tel"
                id="telefone"
                name="telefone"
                value="<?= htmlspecialchars($usuario["telefone"], ENT_QUOTES, "UTF-8") ?>"
                required
            >

            <button type="submit" class="botaoCadastro">
                Salvar alterações
            </button>

        </form>

        <p class="textoLogin">
            <a href="logout.php">Sair da minha conta</a>
        </p>

    </div>

</main>

</body>
</html>
