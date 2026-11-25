
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus cardápios | VIBY</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<main class="paginaCadastro">
    <div class="conteudoCadastro">

        <h1>Meus cardápios</h1>

        <p>Cadastre e organize os cardápios do seu estabelecimento.</p>

        <?php if ($mensagem !== ""): ?>
            <p style="color: red;">
                <?php echo htmlspecialchars($mensagem); ?>
            </p>
        <?php endif; ?>

        <h2 class="tituloGrupo">
            <?php echo $cardapioEdicao ? "Editar cardápio" : "Novo cardápio"; ?>
        </h2>

        <form class="formularioCadastro" method="POST">

            <input
                type="hidden"
                name="id_cardapio"
                value="<?php echo $cardapioEdicao["id_cardapio"] ?? ""; ?>"
            >

            <label for="nome">Nome do cardápio</label>

            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Ex.: Cardápio de bebidas"
                value="<?php echo htmlspecialchars($cardapioEdicao["nome"] ?? ""); ?>"
                required
            >

            <label for="descricao">Descrição</label>

            <textarea
                id="descricao"
                name="descricao"
                placeholder="Descreva este cardápio"
            ><?php echo htmlspecialchars($cardapioEdicao["descricao"] ?? ""); ?></textarea>

            <button type="submit" class="botaoCadastro">
                <?php echo $cardapioEdicao ? "Salvar alterações" : "Cadastrar cardápio"; ?>
            </button>

            <?php if ($cardapioEdicao): ?>
                <p>
                    <a href="cardapio.php">Cancelar edição</a>
                </p>
            <?php endif; ?>

        </form>

        <h2 class="tituloGrupo">Cardápios cadastrados</h2>

        <?php if (count($cardapios) > 0): ?>

            <?php foreach ($cardapios as $cardapio): ?>

                <div class="grupoOpcoes">

                    <h3>
                        <?php echo htmlspecialchars($cardapio["nome"]); ?>
                    </h3>

                    <p>
                        <?php echo htmlspecialchars($cardapio["descricao"] ?? ""); ?>
                    </p>

                    <a href="cardapio.php?editar=<?php echo $cardapio["id_cardapio"]; ?>">
                        Editar cardápio
                    </a>

                    <p>
                        <a href="itens-cardapio.php?id_cardapio=<?php echo $cardapio["id_cardapio"]; ?>">
                            Gerenciar itens
                        </a>
                    </p>
                    <form method="POST" action="cardapio.php"
    onsubmit="return confirm('Tem certeza que deseja excluir este cardápio e todos os seus itens?');">

    <input type="hidden" name="acao" value="excluir">

    <input
        type="hidden"
        name="id_cardapio"
        value="<?php echo $cardapio["id_cardapio"]; ?>"
    >

    <button type="submit" class="botaoCadastro">
        Excluir cardápio
    </button>

</form>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p>Nenhum cardápio cadastrado ainda.</p>

        <?php endif; ?>

        <p class="textoLogin">
            <a href="painel-estabelecimento.php">Voltar ao painel</a>
        </p>

    </div>
</main>

</body>
</html>
