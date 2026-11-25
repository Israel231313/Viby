
<?php
session_start();

if (!isset($_SESSION["id_estabelecimento"])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/../dao/CardapioDAO.php";
require_once __DIR__ . "/../dao/ItemCardapioDAO.php";
require_once __DIR__ . "/../classes/ItemCardapio.php";

$idEstabelecimento = $_SESSION["id_estabelecimento"];

$cardapioDAO = new CardapioDAO();
$itemDAO = new ItemCardapioDAO();

$cardapios = $cardapioDAO->listarPorEstabelecimento($idEstabelecimento);

$mensagem = "";
$idCardapio = (int) ($_GET["id_cardapio"] ?? 0);
$idEdicao = (int) ($_GET["editar"] ?? 0);

$cardapioSelecionado = null;
$itemEdicao = null;

// Processa as ações
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idCardapio = (int) ($_POST["id_cardapio"] ?? 0);
    $idEdicao = (int) ($_POST["id_item"] ?? 0);
    $acao = $_POST["acao"] ?? "";
}

// Verifica se o cardápio pertence ao estabelecimento
foreach ($cardapios as $cardapio) {
    if ((int) $cardapio["id_cardapio"] === $idCardapio) {
        $cardapioSelecionado = $cardapio;
        break;
    }
}

// Busca o item que será editado
if ($cardapioSelecionado && $idEdicao > 0 && $_SERVER["REQUEST_METHOD"] !== "POST") {
    $itemEdicao = $itemDAO->buscarPorId($idEdicao);

    if (
        !$itemEdicao ||
        (int) $itemEdicao["id_cardapio"] !== $idCardapio
    ) {
        $itemEdicao = null;
        $mensagem = "Item não encontrado.";
    }
}

// Processa cadastro, edição ou exclusão
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!$cardapioSelecionado) {
        $mensagem = "Selecione um cardápio válido.";
    } else {

        // Excluir item
        if ($acao === "excluir") {
            $itemExistente = $itemDAO->buscarPorId($idEdicao);

            if (
                !$itemExistente ||
                (int) $itemExistente["id_cardapio"] !== $idCardapio
            ) {
                $mensagem = "Item não encontrado.";
            } else {
                try {
                    $itemDAO->excluir($idEdicao);

                    header("Location: itens-cardapio.php?id_cardapio=" . $idCardapio);
                    exit;

                } catch (PDOException $erro) {
                    $mensagem = "Erro ao excluir o item.";
                }
            }

        } else {

            // Cadastrar ou editar item
            $nome = trim($_POST["nome"] ?? "");
            $descricao = trim($_POST["descricao"] ?? "");
            $preco = str_replace(",", ".", $_POST["preco"] ?? "0");
            $categoria = trim($_POST["categoria"] ?? "");
            $foto = trim($_POST["foto"] ?? "");
            $disponivel = isset($_POST["disponivel"]) ? 1 : 0;

            if ($nome === "" || !is_numeric($preco) || (float) $preco < 0) {
                $mensagem = "Informe um nome e um preço válido.";
            } else {
                try {
                    $item = new ItemCardapio(
                        $idCardapio,
                        $nome,
                        $descricao,
                        $preco,
                        $categoria,
                        $foto,
                        $disponivel
                    );

                    if ($idEdicao > 0) {
                        $itemExistente = $itemDAO->buscarPorId($idEdicao);

                        if (
                            !$itemExistente ||
                            (int) $itemExistente["id_cardapio"] !== $idCardapio
                        ) {
                            $mensagem = "Item não encontrado.";
                        } else {
                            $itemDAO->atualizar($idEdicao, $item);
                        }

                    } else {
                        $itemDAO->cadastrar($item);
                    }

                    if ($mensagem === "") {
                        header("Location: itens-cardapio.php?id_cardapio=" . $idCardapio);
                        exit;
                    }

                } catch (PDOException $erro) {
                    $mensagem = "Erro ao salvar o item.";
                }
            }
        }
    }
}

$itens = [];

if ($cardapioSelecionado) {
    $itens = $itemDAO->listarPorCardapio($idCardapio);
}
