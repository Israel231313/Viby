
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

        <form class="formularioCadastro" id="formEstabelecimento">

            <h2 class="tituloGrupo">Dados do estabelecimento</h2>

            <label for="nomeEstabelecimento">Nome do estabelecimento</label>
            <input type="text" id="nomeEstabelecimento" value="Estação 27 Gastrobar" required>

            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" value="12.345.678/0001-90" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" value="(42) 99999-8888" required>

            <label for="email">E-mail de contato</label>
            <input type="email" id="email" value="contato@estacao27.com" required>

            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" value="Rua XV de Novembro, Centro, Ponta Grossa" required>

            <label for="descricao">Descrição do estabelecimento</label>
            <input type="text" id="descricao" value="Gastronomia, drinks e música ao vivo." required>

            <h2 class="tituloGrupo">Categorias</h2>
            <p class="descricaoSelecao">Selecione até 3 categorias.</p>

            <div class="grupoOpcoes" id="grupoCategorias">
                <button type="button" class="opcaoMultipla selecionado" data-valor="Bar">Bar</button>
                <button type="button" class="opcaoMultipla" data-valor="Boteco">Boteco</button>
                <button type="button" class="opcaoMultipla" data-valor="Restaurante">Restaurante</button>
                <button type="button" class="opcaoMultipla" data-valor="Hamburgueria">Hamburgueria</button>
                <button type="button" class="opcaoMultipla" data-valor="Cafeteria">Cafeteria</button>
                <button type="button" class="opcaoMultipla" data-valor="Padaria">Padaria</button>
                <button type="button" class="opcaoMultipla" data-valor="Balada">Balada</button>
                <button type="button" class="opcaoMultipla" data-valor="Casa de shows">Casa de shows</button>
                <button type="button" class="opcaoMultipla" data-valor="Sorveteria">Sorveteria</button>
                <button type="button" class="opcaoMultipla" data-valor="Outro">Outro</button>
            </div>

            <small id="avisoCategorias">1 de 3 categorias selecionadas.</small>

            <h2 class="tituloGrupo">Estilos</h2>

            <div class="grupoOpcoes" id="grupoEstilos">
                <button type="button" class="opcaoMultipla selecionado" data-valor="Rock">Rock</button>
                <button type="button" class="opcaoMultipla" data-valor="Pop">Pop</button>
                <button type="button" class="opcaoMultipla" data-valor="Sertanejo">Sertanejo</button>
                <button type="button" class="opcaoMultipla" data-valor="Pagode">Pagode</button>
                <button type="button" class="opcaoMultipla" data-valor="Samba">Samba</button>
                <button type="button" class="opcaoMultipla" data-valor="Eletrônica">Eletrônica</button>
                <button type="button" class="opcaoMultipla" data-valor="MPB">MPB</button>
                <button type="button" class="opcaoMultipla" data-valor="Jazz">Jazz</button>
                <button type="button" class="opcaoMultipla" data-valor="Blues">Blues</button>
                <button type="button" class="opcaoMultipla" data-valor="Reggae">Reggae</button>
                <button type="button" class="opcaoMultipla" data-valor="Funk">Funk</button>
                <button type="button" class="opcaoMultipla" data-valor="Variado">Variado</button>
            </div>

            <h2 class="tituloGrupo">Características</h2>

            <div class="grupoOpcoes" id="grupoCaracteristicas">
                <button type="button" class="opcaoMultipla selecionado" data-valor="Música ao vivo">Música ao vivo</button>
                <button type="button" class="opcaoMultipla selecionado" data-valor="Área externa">Área externa</button>
                <button type="button" class="opcaoMultipla" data-valor="Espaço para fumantes">Espaço para fumantes</button>
                <button type="button" class="opcaoMultipla" data-valor="Ambiente romântico">Ambiente romântico</button>
                <button type="button" class="opcaoMultipla" data-valor="Espaço kids">Espaço kids</button>
                <button type="button" class="opcaoMultipla" data-valor="Estacionamento">Estacionamento</button>
                <button type="button" class="opcaoMultipla selecionado" data-valor="Happy hour">Happy hour</button>
                <button type="button" class="opcaoMultipla" data-valor="Pet friendly">Pet friendly</button>
                <button type="button" class="opcaoMultipla" data-valor="Wi-Fi">Wi-Fi</button>
                <button type="button" class="opcaoMultipla" data-valor="Acessibilidade">Acessibilidade</button>
                <button type="button" class="opcaoMultipla" data-valor="Delivery">Delivery</button>
                <button type="button" class="opcaoMultipla" data-valor="Espaço para eventos">Espaço para eventos</button>
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

    if (document.querySelectorAll("#grupoCategorias .selecionado").length === 0) {
        alert("Selecione pelo menos uma categoria.");
        return;
    }

    alert("Alterações demonstrativas realizadas com sucesso!");
});
</script>

</body>
</html>
