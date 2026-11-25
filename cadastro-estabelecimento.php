
<?php
require_once __DIR__ . "/dao/EstabelecimentoDAO.php";

$mensagem = "";
$sucesso = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nomeEstabelecimento"] ?? "");
    $descricao = trim($_POST["descricao"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $cnpj = trim($_POST["cnpj"] ?? "");
    $endereco = trim($_POST["endereco"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $confirmarSenha = $_POST["confirmarSenha"] ?? "";

    $categorias = $_POST["categorias"] ?? [];
    $estilos = $_POST["estilos"] ?? [];
    $caracteristicas = $_POST["caracteristicas"] ?? [];

    if (
        empty($nome) ||
        empty($cnpj) ||
        empty($endereco) ||
        empty($senha)
    ) {
        $mensagem = "Preencha os campos obrigatórios.";

    } elseif ($senha !== $confirmarSenha) {
        $mensagem = "As senhas não coincidem.";

    } elseif (empty($categorias)) {
        $mensagem = "Selecione pelo menos uma categoria.";

    } else {

        try {

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $estabelecimento = new Estabelecimento(
                $nome,
                $descricao,
                $telefone,
                $email,
                $cnpj,
                $senhaHash,
                $endereco,
                $categorias,
                $estilos,
                $caracteristicas
            );

            $dao = new EstabelecimentoDAO();
            $dao->cadastrar($estabelecimento);

            $mensagem = "Estabelecimento cadastrado com sucesso!";
            $sucesso = true;

        } catch (PDOException $erro) {

            $mensagem = "Não foi possível cadastrar o estabelecimento. Verifique os dados e tente novamente.";
        }
    }
} else {
    $mensagem = "Acesse o cadastro pelo formulário de estabelecimento.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | VIBY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main class="paginaCadastro">
    <div class="conteudoCadastro">

        <h1>
            <?php echo $sucesso ? "Cadastro realizado!" : "Atenção"; ?>
        </h1>

        <p>
            <?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?>
        </p>

        <?php if ($sucesso): ?>

            <a href="login.html">Fazer login</a>

        <?php else: ?>

            <a href="cadastro-estabelecimento.html">Voltar ao cadastro</a>

        <?php endif; ?>

    </div>
</main>

</body>
</html>
