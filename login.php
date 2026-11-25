
<?php

session_start();

require_once __DIR__ . "/dao/UsuarioDAO.php";
require_once __DIR__ . "/dao/EstabelecimentoDAO.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    try {

        // Verifica usuário comum
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario["senha"])) {

            session_regenerate_id(true);

            $_SESSION = [];

            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nome_usuario"] = $usuario["nome"];

            session_write_close();

            header("Location: /Viby/index.php");
            exit;
        }

        // Verifica estabelecimento
        $estabelecimentoDAO = new EstabelecimentoDAO();
        $estabelecimento = $estabelecimentoDAO->buscarPorEmail($email);

        if ($estabelecimento && password_verify($senha, $estabelecimento["senha"])) {

            session_regenerate_id(true);

            $_SESSION = [];

            $_SESSION["id_estabelecimento"] = $estabelecimento["id_estabelecimento"];
            $_SESSION["nome_estabelecimento"] = $estabelecimento["nome"];

            header("Location: /Viby/index.php");
            exit;
        }

        $mensagem = "E-mail ou senha incorretos.";

    } catch (PDOException $erro) {

        $mensagem = "Erro ao realizar login.";

    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | VIBY</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

    <main class="paginaCadastro">

        <a href="/Viby/index.php" class="voltarInicio">
            ← Voltar ao início
        </a>

        <div class="conteudoCadastro">

            <img src="img/logo.png" alt="Logo Viby" class="logoCadastro">

            <h1>Bem-vindo de volta!</h1>
            <p>Entre na sua conta e encontre sua vibe.</p>

            <?php if (!empty($mensagem)): ?>
                <p>
                    <?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?>
                </p>
            <?php endif; ?>

            <form class="formularioCadastro" action="login.php" method="POST">

                <label for="emailLogin">E-mail</label>
                <input
                    type="email"
                    id="emailLogin"
                    name="email"
                    placeholder="Digite seu e-mail"
                    required
                >

                <label for="senhaLogin">Senha</label>
                <input
                    type="password"
                    id="senhaLogin"
                    name="senha"
                    placeholder="Digite sua senha"
                    required
                >

                <button type="submit" class="botaoCadastro">Entrar</button>

            </form>

            <p class="textoLogin">
                Ainda não tem uma conta?
                <a href="cadastro.html">Cadastre-se</a>
            </p>

        </div>

    </main>

</body>
</html>
