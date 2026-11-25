
<?php
session_start();

if (!isset($_SESSION["id_estabelecimento"])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/dao/EstabelecimentoDAO.php";

$dao = new EstabelecimentoDAO();

$estabelecimento = $dao->buscarPorId(
    $_SESSION["id_estabelecimento"]
);

if (!$estabelecimento) {
    die("Estabelecimento não encontrado.");
}

function escapar($valor) {
    return htmlspecialchars($valor ?? "", ENT_QUOTES, "UTF-8");
}

$nome = escapar($estabelecimento["nome"]);
$descricao = escapar($estabelecimento["descricao"]);
$telefone = escapar($estabelecimento["telefone"]);
$email = escapar($estabelecimento["email"]);

$endereco = escapar($estabelecimento["rua"]);
$cidade = escapar($estabelecimento["cidade"]);
$estado = escapar($estabelecimento["estado"]);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nome; ?> | Viby</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="perfilTopo">
    <a href="index.php">← Voltar ao Viby</a>
    <img src="img/logo.png" alt="Viby">
</header>

<main class="perfilEstabelecimento">

    <div class="capaEstabelecimento">
        <img src="img/categorias/bares.jpg" alt="Ambiente do estabelecimento">
    </div>

    <section class="dadosEstabelecimento">

        <h1><?php echo $nome; ?></h1>

        <p class="descricaoPerfil">
            <?php echo $descricao; ?>
        </p>

        <div class="informacoesPerfil">

            <?php if ($endereco || $cidade || $estado): ?>
                <p>📍 <?php echo $endereco; ?>
                    <?php echo $cidade; ?>
                    <?php echo $estado; ?>
                </p>
            <?php endif; ?>

            <?php if ($telefone): ?>
                <p>📞 <?php echo $telefone; ?></p>
            <?php endif; ?>

            <?php if ($email): ?>
                <p>✉️ <?php echo $email; ?></p>
            <?php endif; ?>

        </div>

    </section>

    <section class="sobrePerfil">
        <h2>Sobre o estabelecimento</h2>
        <p><?php echo $descricao; ?></p>
    </section>

    <p class="avisoDemonstracao">
        Perfil do estabelecimento
    </p>

</main>

</body>
</html>
