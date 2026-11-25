
<?php
session_start();

if (!isset($_SESSION["id_estabelecimento"])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/dao/EstabelecimentoDAO.php";

$dao = new EstabelecimentoDAO();

$id = $_SESSION["id_estabelecimento"];
$mensagem = "";

// Recebe e salva as alterações
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dados = [
        "nome" => trim($_POST["nome"] ?? ""),
        "cnpj" => trim($_POST["cnpj"] ?? ""),
        "telefone" => trim($_POST["telefone"] ?? ""),
        "email" => trim($_POST["email"] ?? ""),
        "endereco" => trim($_POST["endereco"] ?? ""),
        "descricao" => trim($_POST["descricao"] ?? "")
    ];

    $categorias = $_POST["categorias"] ?? [];
    $estilos = $_POST["estilos"] ?? [];
    $caracteristicas = $_POST["caracteristicas"] ?? [];

    try {
        $dao->atualizar(
            $id,
            $dados,
            $categorias,
            $estilos,
            $caracteristicas
        );

        $_SESSION["nome_estabelecimento"] = $dados["nome"];

        header("Location: perfil-estabelecimento.php");
        exit;

    } catch (Throwable $erro) {
        $mensagem = "Erro ao salvar: " . $erro->getMessage();
    }
}

$estabelecimento = $dao->buscarPorId($id);

if (!$estabelecimento) {
    die("Estabelecimento não encontrado.");
}

$categoriasSelecionadas = $dao->buscarCategorias($id);
$estilosSelecionados = $dao->buscarEstilos($id);
$caracteristicasSelecionadas = $dao->buscarCaracteristicas($id);

function escapar($valor) {
    return htmlspecialchars($valor ?? "", ENT_QUOTES, "UTF-8");
}

function selecionado($lista, $valor) {
    return in_array($valor, $lista, true) ? "selecionado" : "";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar estabelecimento | VIBY</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<main class="paginaCadastro">

    <a href="perfil-estabelecimento.php" class="voltarInicio">← Voltar ao perfil</a>

    <div class="conteudoCadastro">

        <img src="img/logo.png" alt="Logo Viby" class="logoCadastro">

        <h1>Editar estabelecimento</h1>
        <p>Atualize as informações do seu negócio.</p>

        <?php if ($mensagem !== ""): ?>
            <p style="color: red;">
                <?php echo escapar($mensagem); ?>
            </p>
        <?php endif; ?>

        <form class="formularioCadastro" id="formEstabelecimento" method="POST" action="editar-estabelecimento.php">

            <h2 class="tituloGrupo">Dados do estabelecimento</h2>

            <label for="nomeEstabelecimento">Nome do estabelecimento</label>
            <input type="text" id="nomeEstabelecimento" name="nome" value="<?php echo escapar($estabelecimento['nome']); ?>" required>

            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" name="cnpj" value="<?php echo escapar($estabelecimento['cnpj']); ?>" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" value="<?php echo escapar($estabelecimento['telefone']); ?>" required>

            <label for="email">E-mail de contato</label>
            <input type="email" id="email" name="email" value="<?php echo escapar($estabelecimento['email']); ?>" required>

            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" value="<?php echo escapar($estabelecimento['rua']); ?>" required>

            <label for="descricao">Descrição do estabelecimento</label>
            <input type="text" id="descricao" name="descricao" value="<?php echo escapar($estabelecimento['descricao']); ?>" required>

            <h2 class="tituloGrupo">Categorias</h2>
            <p class="descricaoSelecao">Selecione até 3 categorias.</p>

            <div class="grupoOpcoes" id="grupoCategorias">
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Bar'); ?>" data-valor="Bar">Bar</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Boteco'); ?>" data-valor="Boteco">Boteco</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Restaurante'); ?>" data-valor="Restaurante">Restaurante</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Hamburgueria'); ?>" data-valor="Hamburgueria">Hamburgueria</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Cafeteria'); ?>" data-valor="Cafeteria">Cafeteria</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Padaria'); ?>" data-valor="Padaria">Padaria</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Balada'); ?>" data-valor="Balada">Balada</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Casa de shows'); ?>" data-valor="Casa de shows">Casa de shows</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Sorveteria'); ?>" data-valor="Sorveteria">Sorveteria</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($categoriasSelecionadas, 'Outro'); ?>" data-valor="Outro">Outro</button>
            </div>

            <small id="avisoCategorias"><?php echo count($categoriasSelecionadas); ?> de 3 categorias selecionadas.</small>

            <h2 class="tituloGrupo">Estilos</h2>

            <div class="grupoOpcoes" id="grupoEstilos">
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Rock'); ?>" data-valor="Rock">Rock</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Pop'); ?>" data-valor="Pop">Pop</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Sertanejo'); ?>" data-valor="Sertanejo">Sertanejo</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Pagode'); ?>" data-valor="Pagode">Pagode</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Samba'); ?>" data-valor="Samba">Samba</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Eletrônica'); ?>" data-valor="Eletrônica">Eletrônica</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'MPB'); ?>" data-valor="MPB">MPB</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Jazz'); ?>" data-valor="Jazz">Jazz</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Blues'); ?>" data-valor="Blues">Blues</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Reggae'); ?>" data-valor="Reggae">Reggae</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Funk'); ?>" data-valor="Funk">Funk</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($estilosSelecionados, 'Variado'); ?>" data-valor="Variado">Variado</button>
            </div>

            <h2 class="tituloGrupo">Características</h2>

            <div class="grupoOpcoes" id="grupoCaracteristicas">
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Música ao vivo'); ?>" data-valor="Música ao vivo">Música ao vivo</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Área externa'); ?>" data-valor="Área externa">Área externa</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Espaço para fumantes'); ?>" data-valor="Espaço para fumantes">Espaço para fumantes</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Ambiente romântico'); ?>" data-valor="Ambiente romântico">Ambiente romântico</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Espaço kids'); ?>" data-valor="Espaço kids">Espaço kids</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Estacionamento'); ?>" data-valor="Estacionamento">Estacionamento</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Happy hour'); ?>" data-valor="Happy hour">Happy hour</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Pet friendly'); ?>" data-valor="Pet friendly">Pet friendly</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Wi-Fi'); ?>" data-valor="Wi-Fi">Wi-Fi</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Acessibilidade'); ?>" data-valor="Acessibilidade">Acessibilidade</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Delivery'); ?>" data-valor="Delivery">Delivery</button>
                <button type="button" class="opcaoMultipla <?php echo selecionado($caracteristicasSelecionadas, 'Espaço para eventos'); ?>" data-valor="Espaço para eventos">Espaço para eventos</button>
            </div>

            <button type="submit" class="botaoCadastro">
                Salvar alterações
            </button>

        </form>

        <p class="textoLogin">
            <a href="perfil-estabelecimento.php">Visualizar perfil público</a>
        </p>

    </div>

</main>

<script>

function configurarSelecao(idGrupo, limite, idAviso) {
    const grupo = document.getElementById(idGrupo);
    const aviso = idAviso ? document.getElementById(idAviso) : null;

    grupo.querySelectorAll(".opcaoMultipla").forEach(botao => {
        botao.addEventListener("click", function() {
            const selecionados = grupo.querySelectorAll(".selecionado");

            if (botao.classList.contains("selecionado")) {
                botao.classList.remove("selecionado");
            } else {
                if (limite !== null && selecionados.length >= limite) {
                    alert("Você pode selecionar no máximo " + limite + " opções.");
                    return;
                }

                botao.classList.add("selecionado");
            }

            if (aviso) {
                aviso.textContent =
                    grupo.querySelectorAll(".selecionado").length +
                    " de " + limite + " categorias selecionadas.";
            }
        });
    });
}

configurarSelecao("grupoCategorias", 3, "avisoCategorias");
configurarSelecao("grupoEstilos", null, null);
configurarSelecao("grupoCaracteristicas", null, null);

document.getElementById("formEstabelecimento").addEventListener("submit", function(event) {
    event.preventDefault();

    const categorias = document.querySelectorAll("#grupoCategorias .selecionado");

    if (categorias.length === 0) {
        alert("Selecione pelo menos uma categoria.");
        return;
    }

    const grupos = [
        { id: "grupoCategorias", nome: "categorias[]" },
        { id: "grupoEstilos", nome: "estilos[]" },
        { id: "grupoCaracteristicas", nome: "caracteristicas[]" }
    ];

    grupos.forEach(grupo => {
        document.querySelectorAll(
            'input[name="' + grupo.nome + '"]'
        ).forEach(input => input.remove());

        document.querySelectorAll("#" + grupo.id + " .selecionado")
            .forEach(botao => {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = grupo.nome;
                input.value = botao.dataset.valor;
                this.appendChild(input);
            });
    });

    this.submit();
});

</script>

</body>
</html>
