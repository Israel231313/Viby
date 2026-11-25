
<?php
session_start();

if (!isset($_SESSION["id_estabelecimento"])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/../classes/Cardapio.php";
require_once __DIR__ . "/../dao/CardapioDAO.php";
require_once __DIR__ . "/../dao/ItemCardapioDAO.php";

$dao = new CardapioDAO();
$itemDAO = new ItemCardapioDAO();

$idEstabelecimento = $_SESSION["id_estabelecimento"];
$mensagem = "";

$idEdicao = (int) ($_GET["editar"] ?? 0);
$cardapioEdicao = null;

// Processa exclusão
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["acao"] ?? "") === "excluir") {

    $idCardapio = (int) ($_POST["id_cardapio"] ?? 0);

    $cardapioExistente = $dao->buscarPorId($idCardapio);

    if (
        !$cardapioExistente ||
        (int) $cardapioExistente["id_estabelecimento"] !== (int) $idEstabelecimento
    ) {
        $mensagem = "Cardápio não encontrado.";
    } else {
        try {
            // Exclui primeiro os itens relacionados
            $itens = $itemDAO->listarPorCardapio($idCardapio);

            foreach ($itens as $item) {
                $itemDAO->excluir($item["id_item"]);
            }

            // Depois exclui o cardápio
            $dao->excluir($idCardapio, $idEstabelecimento);

            header("Location: cardapio.php");
            exit;

        } catch (PDOException $erro) {
            $mensagem = "Erro ao excluir o cardápio.";
        }
    }
}

// Busca o cardápio para edição
if ($idEdicao > 0) {
    $cardapioEdicao = $dao->buscarPorId($idEdicao);

    if (
        !$cardapioEdicao ||
        (int) $cardapioEdicao["id_estabelecimento"] !== (int) $idEstabelecimento
    ) {
        $cardapioEdicao = null;
        $mensagem = "Cardápio não encontrado.";
    }
}

// Cadastro ou edição
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["acao"] ?? "") !== "excluir") {

    $nome = trim($_POST["nome"] ?? "");
    $descricao = trim($_POST["descricao"] ?? "");
    $idCardapio = (int) ($_POST["id_cardapio"] ?? 0);

    if ($nome === "") {
        $mensagem = "Informe o nome do cardápio.";
    } else {
        try {
            if ($idCardapio > 0) {
                $cardapioExistente = $dao->buscarPorId($idCardapio);

                if (
                    !$cardapioExistente ||
                    (int) $cardapioExistente["id_estabelecimento"] !== (int) $idEstabelecimento
                ) {
                    $mensagem = "Cardápio não encontrado.";
                } else {
                    $dao->atualizar(
                        $idCardapio,
                        $idEstabelecimento,
                        $nome,
                        $descricao
                    );
                }
            } else {
                $cardapio = new Cardapio(
                    $idEstabelecimento,
                    $nome,
                    $descricao
                );

                $dao->cadastrar($cardapio);
            }

            if ($mensagem === "") {
                header("Location: cardapio.php");
                exit;
            }

        } catch (PDOException $erro) {
            $mensagem = "Erro ao salvar o cardápio.";
        }
    }
}

$cardapios = $dao->listarPorEstabelecimento($idEstabelecimento);
