
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens do cardápio | VIBY</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<main class="paginaCadastro">

    <div class="conteudoCadastro">

        <h1>Itens do cardápio</h1>
        <p>Cadastre e organize os produtos do seu estabelecimento.</p>

        <h2 class="tituloGrupo">Selecionar cardápio</h2>

        <form method="GET" action="itens-cardapio.php">

            <label for="id_cardapio">Cardápio</label>

            <select name="id_cardapio" id="id_cardapio" required>
                <option value="">Selecione um cardápio</option>

                <?php foreach ($cardapios as $cardapio): ?>
                    <option
                        value="<?php echo $cardapio["id_cardapio"]; ?>"
                        <?php echo $idCardapio == $cardapio["id_cardapio"] ? "selected" : ""; ?>
                    >
                        <?php echo htmlspecialchars($cardapio["nome"]); ?>
                    </option>
                <?php endforeach; ?>

            </select>

            <button type="submit" class="botaoCadastro">
                Abrir cardápio
            </button>

        </form>

        <?php if ($mensagem !== ""): ?>
            <p style="color: red;">
                <?php echo htmlspecialchars($mensagem); ?>
            </p>
        <?php endif; ?>

        <?php if ($cardapioSelecionado): ?>

            <h2 class="tituloGrupo">
                <?php echo $itemEdicao ? "Editar item" : "Novo item"; ?>
                — <?php echo htmlspecialchars($cardapioSelecionado["nome"]); ?>
            </h2>

            <form class="formularioCadastro" method="POST"
                action="itens-cardapio.php?id_cardapio=<?php echo $idCardapio; ?>">

                <input type="hidden" name="id_cardapio" value="<?php echo $idCardapio; ?>">

                <input
                    type="hidden"
                    name="id_item"
                    value="<?php echo $itemEdicao ? $itemEdicao["id_item"] : ""; ?>"
                >

                <label for="nome">Nome do item</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?php echo htmlspecialchars($itemEdicao["nome"] ?? ""); ?>"
                    required
                >

                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao"><?php
                    echo htmlspecialchars($itemEdicao["descricao"] ?? "");
                ?></textarea>

                <label for="preco">Preço</label>
                <input
                    type="number"
                    id="preco"
                    name="preco"
                    min="0"
                    step="0.01"
                    value="<?php echo htmlspecialchars($itemEdicao["preco"] ?? ""); ?>"
                    required
                >

                <label for="categoria">Categoria</label>
                <input
                    type="text"
                    id="categoria"
                    name="categoria"
                    value="<?php echo htmlspecialchars($itemEdicao["categoria"] ?? ""); ?>"
                >

                <label for="foto">Foto (endereço da imagem)</label>
                <input
                    type="text"
                    id="foto"
                    name="foto"
                    value="<?php echo htmlspecialchars($itemEdicao["foto"] ?? ""); ?>"
                >

                <label>
                    <input
                        type="checkbox"
                        name="disponivel"
                        value="1"
                        <?php echo (!$itemEdicao || $itemEdicao["disponivel"]) ? "checked" : ""; ?>
                    >
                    Item disponível
                </label>

                <button type="submit" class="botaoCadastro">
                    <?php echo $itemEdicao ? "Salvar alterações" : "Cadastrar item"; ?>
                </button>

                <?php if ($itemEdicao): ?>
                    <p>
                        <a href="itens-cardapio.php?id_cardapio=<?php echo $idCardapio; ?>">
                            Cancelar edição
                        </a>
                    </p>
                <?php endif; ?>

            </form>

            <h2 class="tituloGrupo">Itens cadastrados</h2>

            <?php if (count($itens) > 0): ?>

                <?php foreach ($itens as $item): ?>

                    <div class="grupoOpcoes">

                        <h3><?php echo htmlspecialchars($item["nome"]); ?></h3>

                        <p>
                            <?php echo htmlspecialchars($item["descricao"] ?? ""); ?>
                        </p>

                        <p>
                            Preço: R$ <?php echo number_format($item["preco"], 2, ",", "."); ?>
                        </p>

                        <p>
                            Categoria: <?php echo htmlspecialchars($item["categoria"] ?? ""); ?>
                        </p>

                        <p>
                            Disponibilidade:
                            <?php echo $item["disponivel"] ? "Disponível" : "Indisponível"; ?>
                        </p>

                        <a href="itens-cardapio.php?id_cardapio=<?php echo $idCardapio; ?>&editar=<?php echo $item["id_item"]; ?>">
                            Editar item
                        </a>

                        <form method="POST"
                            action="itens-cardapio.php?id_cardapio=<?php echo $idCardapio; ?>"
                            onsubmit="return confirm('Tem certeza que deseja excluir este item?');">

                            <input type="hidden" name="id_cardapio" value="<?php echo $idCardapio; ?>">
                            <input type="hidden" name="id_item" value="<?php echo $item["id_item"]; ?>">
                            <input type="hidden" name="acao" value="excluir">

                            <button type="submit" class="botaoCadastro">
                                Excluir
                            </button>

                        </form>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <p>Nenhum item cadastrado neste cardápio.</p>

            <?php endif; ?>

        <?php elseif (count($cardapios) === 0): ?>

            <p>Você ainda não possui cardápios cadastrados.</p>

        <?php endif; ?>

        <p class="textoLogin">
            <a href="cardapio.php">Voltar aos cardápios</a>
        </p>

        <p class="textoLogin">
            <a href="painel-estabelecimento.php">Voltar ao painel</a>
        </p>

    </div>

</main>

</body>
</html>
