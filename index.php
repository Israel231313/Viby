
<?php
session_start();

$usuarioLogado = isset($_SESSION["id_usuario"]);
$nomeUsuario = $usuarioLogado
    ? htmlspecialchars($_SESSION["nome_usuario"], ENT_QUOTES, "UTF-8")
    : "";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIBY</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<section class="hero">

    <nav class="menuConta">

        <?php if ($usuarioLogado): ?>
            <span>Olá, <?php echo $nomeUsuario; ?>!</span>
            <a href="perfil.php">Meu perfil</a>
            <a href="logout.php" class="botaoConta">Sair</a>
        <?php else: ?>
            <a href="login.php">Entrar</a>
            <a href="cadastro.html" class="botaoConta">Cadastrar-se</a>
        <?php endif; ?>

    </nav>

    <img class="logo" src="img/logo.png" alt="Logo Viby">

    <form class="busca">
        <span class="icone-busca">⌕</span>
        <input
            type="search"
            id="campoBusca"
            placeholder="Qual é a sua vibe hoje?"
            aria-label="Descreva o que você procura"
        >
        <button class="bntBuscar" type="submit">Buscar</button>
    </form>

</section>

<main>

    <section class="sugestoes">

        <h2>✨ Sugestões de vibe</h2>

        <div class="listaSugestoes">

            <button type="button" class="itemSugestao">
                Quero tomar cerveja, ouvir rock e encontrar um lugar com área de fumantes.
                <span>→</span>
            </button>

            <button type="button" class="itemSugestao">
                Quero tomar um vinho, comer massas e curtir um ambiente romântico.
                <span>→</span>
            </button>

            <button type="button" class="itemSugestao">
                Quero petiscos, drinks e música ao vivo.
                <span>→</span>
            </button>

            <button type="button" class="itemSugestao">
                Quero um café especial com sobremesa em um lugar aconchegante.
                <span>→</span>
            </button>

            <button type="button" class="itemSugestao">
                Quero sushi, drinks e um ambiente moderno.
                <span>→</span>
            </button>

            <button type="button" class="itemSugestao">
                Quero curtir a vida noturna, com bons drinks, música e gente animada.
                <span>→</span>
            </button>

        </div>

    </section>

    <section class="categorias">

        <h2>Categorias</h2>

        <div class="listaCategorias">

            <div class="cardCategoria">
                <img src="img/categorias/bares.jpg" alt="Bares">
                <h3>Bares</h3>
            </div>

          
            <a href="/Viby/botecos.php" class="cardCategoria" style="text-decoration:none; color:inherit; cursor:pointer;">
    <img src="img/categorias/botecos.jpg" alt="Botecos">
    <h3>Botecos</h3>
</a>

            <div class="cardCategoria">
                <img src="img/categorias/restaurantes.jpg" alt="Restaurantes">
                <h3>Restaurantes</h3>
            </div>

            <div class="cardCategoria">
                <img src="img/categorias/hamburguerias.jpg" alt="Hamburguerias">
                <h3>Hamburguerias</h3>
            </div>

            <div class="cardCategoria">
                <img src="img/categorias/cafeterias.jpg" alt="Cafeterias">
                <h3>Cafeterias</h3>
            </div>

            <div class="cardCategoria">
                <img src="img/categorias/padarias.jpg" alt="Padarias">
                <h3>Padarias</h3>
            </div>

            <div class="cardCategoria">
                <img src="img/categorias/baladas.jpg" alt="Baladas">
                <h3>Baladas</h3>
            </div>

            <div class="cardCategoria">
                <img src="img/categorias/casas-shows.jpg" alt="Casas de shows">
                <h3>Casas de shows</h3>
            </div>

            <div class="cardCategoria">
                <img src="img/categorias/sorveterias.jpg" alt="Sorveterias">
                <h3>Sorveterias</h3>
            </div>

        </div>

    </section>

    <section class="cadastroEstabelecimento">

        <div class="conteudoEstabelecimento">

            <h2>Seu estabelecimento merece estar no Viby!</h2>

            <p>
                Apresente seu negócio, divulgue suas experiências
                e seja encontrado por pessoas que procuram novos lugares.
            </p>

            <a href="cadastro-estabelecimento.html" class="botaoEstabelecimento">
                Cadastre seu estabelecimento →
            </a>

        </div>

    </section>

</main>

<script src="script.js"></script>

</body>
</html>
