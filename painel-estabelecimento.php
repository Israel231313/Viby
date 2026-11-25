
<?php
session_start();

if (!isset($_SESSION["id_estabelecimento"])) {
    header("Location: login.html");
    exit;
}

$nomeEstabelecimento = htmlspecialchars(
    $_SESSION["nome_estabelecimento"],
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Estabelecimento - Viby</title>
   <link rel="stylesheet" href="style.css?v=2">
</head>
<body>

    <header class="painel-header">
        <a href="index.php" class="painel-logo">VIBY</a>

        <a href="logout.php" class="painel-sair">Sair da conta</a>
    </header>

    <main class="painel-container">

        <section class="painel-boas-vindas">
            <span class="painel-subtitulo">ÁREA DO ESTABELECIMENTO</span>

            <h1>Bem-vindo ao seu painel!</h1>

            <p>
                Olá, <strong><?php echo $nomeEstabelecimento; ?></strong>.
                Gerencie as informações do seu estabelecimento.
            </p>
        </section>

        <section class="painel-opcoes">

            <a href="perfil-estabelecimento.php" class="painel-card">
                <div class="painel-card-icone">◉</div>
                <h2>Meu perfil</h2>
                <p>Visualize as informações do seu estabelecimento.</p>
                <span class="painel-card-seta">→</span>
            </a>

            <a href="editar-estabelecimento.php" class="painel-card">
                <div class="painel-card-icone">✎</div>
                <h2>Editar meu perfil</h2>
                <p>Atualize seus dados, descrição e características.</p>
                <span class="painel-card-seta">→</span>
            </a>

            <a href="cardapio.php" class="painel-card">
                <div class="painel-card-icone">☷</div>
                <h2>Gerenciar cardápio</h2>
                <p>Cadastre, edite e organize seus cardápios e itens.</p>
                <span class="painel-card-seta">→</span>
            </a>

            <a href="index.php" class="painel-card">
                <div class="painel-card-icone">⌂</div>
                <h2>Voltar ao início</h2>
                <p>Retorne à página principal do Viby.</p>
                <span class="painel-card-seta">→</span>
            </a>

        </section>

    </main>

    <footer class="painel-footer">
        VIBY — ENCONTRE SUA VIBE.
    </footer>

</body>
</html>
