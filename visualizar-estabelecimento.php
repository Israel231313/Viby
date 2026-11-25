
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação 27 Gastrobar | Viby</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #121212;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
        }

        .perfilTopo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background: #1C1C1C;
            border-bottom: 1px solid #2B2B2B;
        }

        .perfilTopo a {
            color: #FF7A00;
            text-decoration: none;
            font-size: 14px;
        }

        .perfilTopo img {
            width: 85px;
            object-fit: contain;
        }

        .perfilEstabelecimento {
            max-width: 1000px;
            width: 90%;
            margin: 35px auto 60px;
        }

        .capaEstabelecimento {
            width: 100%;
            height: 350px;
            overflow: hidden;
            border-radius: 14px;
            background: #1C1C1C;
        }

        .capaEstabelecimento img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dadosEstabelecimento {
            padding: 30px 5px;
        }

        .perfilCategoria {
            color: #FF7A00;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .dadosEstabelecimento h1 {
            font-size: 34px;
            margin: 12px 0;
        }

        .descricaoPerfil {
            color: #BBBBBB;
            line-height: 1.8;
            max-width: 750px;
        }

        .informacoesPerfil {
            display: flex;
            flex-wrap: wrap;
            gap: 15px 30px;
            margin-top: 25px;
        }

        .informacoesPerfil p {
            color: #CCCCCC;
            font-size: 14px;
        }

        .sobrePerfil {
            padding: 25px;
            background: #1C1C1C;
            border: 1px solid #303030;
            border-radius: 12px;
            margin-bottom: 45px;
        }

        .sobrePerfil h2 {
            color: #FF7A00;
            margin-bottom: 15px;
            font-size: 21px;
        }

        .sobrePerfil p {
            color: #BBBBBB;
            line-height: 1.8;
        }

        .tituloCardapio {
            margin-bottom: 25px;
        }

        .tituloCardapio span {
            color: #FF7A00;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .tituloCardapio h2 {
            font-size: 30px;
            margin: 10px 0;
        }

        .tituloCardapio p {
            color: #999999;
            font-size: 14px;
        }

        .categoriaCardapio {
            background: #1C1C1C;
            border: 1px solid #303030;
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .categoriaToggle {
            width: 100%;
            padding: 22px;
            background: transparent;
            color: #FFFFFF;
            border: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-size: 17px;
            font-weight: bold;
            text-align: left;
        }

        .categoriaToggle:hover {
            color: #FF7A00;
        }

        .setaCardapio {
            color: #FF7A00;
            font-size: 24px;
        }

        .itensCategoria {
            display: none;
            padding: 0 22px 10px;
        }

        .itensCategoria.categoriaAberta {
            display: block;
        }

        .itemPublico {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 18px 0;
            border-top: 1px solid #333333;
        }

        .itemPublico h3 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .itemPublico p {
            color: #999999;
            font-size: 13px;
            line-height: 1.5;
        }

        .itemPublico strong {
            color: #FF7A00;
            white-space: nowrap;
        }

        .avisoDemonstracao {
            text-align: center;
            color: #777777;
            font-size: 12px;
            margin-top: 35px;
        }

        .painel-footer {
            padding: 25px;
            text-align: center;
            color: #777777;
            font-size: 12px;
            letter-spacing: 2px;
            border-top: 1px solid #2B2B2B;
        }

        @media (max-width: 650px) {
            .perfilTopo {
                padding: 18px 5%;
            }

            .perfilEstabelecimento {
                width: 92%;
                margin-top: 20px;
            }

            .capaEstabelecimento {
                height: 220px;
            }

            .dadosEstabelecimento h1 {
                font-size: 27px;
            }

            .informacoesPerfil {
                flex-direction: column;
                gap: 12px;
            }

            .itemPublico {
                align-items: flex-start;
            }

            .itemPublico strong {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<header class="perfilTopo">
    <a href="botecos.php">← Voltar aos botecos</a>
    <img src="img/logo.png" alt="Viby">
</header>

<main class="perfilEstabelecimento">

    <div class="capaEstabelecimento">
        <img src="img/categorias/bares.jpg" alt="Estação 27 Gastrobar">
    </div>

    <section class="dadosEstabelecimento">
        <span class="perfilCategoria">GASTROBAR</span>

        <h1>Estação 27 Gastrobar</h1>

        <p class="descricaoPerfil">
            Um espaço descontraído para aproveitar bons momentos,
            reunir os amigos e experimentar sabores especiais.
            Aqui você encontra hambúrgueres, porções, drinks e música ao vivo.
        </p>

        <div class="informacoesPerfil">
            <p>📍 Centro – Ponta Grossa, PR</p>
            <p>📞 (42) 99999-2727</p>
            <p>✉️ contato@estacao27.com.br</p>
            <p>🕒 Terça a domingo – 18h às 00h</p>
        </div>
    </section>

    <section class="sobrePerfil">
        <h2>Sobre o estabelecimento</h2>
        <p>
            O Estação 27 Gastrobar combina boa gastronomia,
            ambiente agradável e entretenimento. Um lugar ideal
            para aproveitar a noite com amigos e família.
        </p>
    </section>

    <section class="cardapioPublico">

        <div class="tituloCardapio">
            <span>CONHEÇA NOSSAS OPÇÕES</span>
            <h2>Nosso cardápio</h2>
            <p>Escolha uma categoria para visualizar os produtos.</p>
        </div>

        <div class="categoriaCardapio">
            <button class="categoriaToggle" type="button">
                <span>🍔 Hambúrgueres</span>
                <span class="setaCardapio">+</span>
            </button>

            <div class="itensCategoria">
                <article class="itemPublico">
                    <div>
                        <h3>Estação Burger</h3>
                        <p>Pão brioche, hambúrguer artesanal, queijo cheddar e molho especial.</p>
                    </div>
                    <strong>R$ 32,90</strong>
                </article>

                <article class="itemPublico">
                    <div>
                        <h3>Double Bacon</h3>
                        <p>Dois hambúrgueres, bacon crocante, queijo e molho da casa.</p>
                    </div>
                    <strong>R$ 39,90</strong>
                </article>

                <article class="itemPublico">
                    <div>
                        <h3>Cheese Salada</h3>
                        <p>Hambúrguer artesanal, queijo, alface, tomate e maionese.</p>
                    </div>
                    <strong>R$ 29,90</strong>
                </article>
            </div>
        </div>

        <div class="categoriaCardapio">
            <button class="categoriaToggle" type="button">
                <span>🍟 Porções</span>
                <span class="setaCardapio">+</span>
            </button>

            <div class="itensCategoria">
                <article class="itemPublico">
                    <div>
                        <h3>Batata Frita</h3>
                        <p>Porção de batatas fritas crocantes.</p>
                    </div>
                    <strong>R$ 24,90</strong>
                </article>

                <article class="itemPublico">
                    <div>
                        <h3>Frango à Passarinho</h3>
                        <p>Frango temperado, frito e acompanhado de limão.</p>
                    </div>
                    <strong>R$ 36,90</strong>
                </article>

                <article class="itemPublico">
                    <div>
                        <h3>Calabresa Acebolada</h3>
                        <p>Calabresa grelhada com cebola.</p>
                    </div>
                    <strong>R$ 34,90</strong>
                </article>
            </div>
        </div>

        <div class="categoriaCardapio">
            <button class="categoriaToggle" type="button">
                <span>🥤 Bebidas</span>
                <span class="setaCardapio">+</span>
            </button>

            <div class="itensCategoria">
                <article class="itemPublico">
                    <div>
                        <h3>Refrigerante</h3>
                        <p>Lata de 350 ml.</p>
                    </div>
                    <strong>R$ 7,00</strong>
                </article>

                <article class="itemPublico">
                    <div>
                        <h3>Suco Natural</h3>
                        <p>Suco natural de laranja ou limão.</p>
                    </div>
                    <strong>R$ 10,00</strong>
                </article>
            </div>
        </div>

        <div class="categoriaCardapio">
            <button class="categoriaToggle" type="button">
                <span>🍰 Sobremesas</span>
                <span class="setaCardapio">+</span>
            </button>

            <div class="itensCategoria">
                <article class="itemPublico">
                    <div>
                        <h3>Brownie com Sorvete</h3>
                        <p>Brownie de chocolate acompanhado de sorvete de creme.</p>
                    </div>
                    <strong>R$ 18,90</strong>
                </article>

                <article class="itemPublico">
                    <div>
                        <h3>Pudim da Casa</h3>
                        <p>Pudim tradicional com calda de caramelo.</p>
                    </div>
                    <strong>R$ 12,00</strong>
                </article>
            </div>
        </div>

    </section>

    <p class="avisoDemonstracao">
        Informações e cardápio demonstrativos para apresentação do Viby.
    </p>

</main>

<footer class="painel-footer">
    VIBY — ENCONTRE SUA VIBE.
</footer>

<script>
    const categorias = document.querySelectorAll(".categoriaToggle");

    categorias.forEach((botao) => {
        botao.addEventListener("click", () => {
            const itens = botao.nextElementSibling;
            const seta = botao.querySelector(".setaCardapio");

            itens.classList.toggle("categoriaAberta");

            seta.textContent = itens.classList.contains("categoriaAberta")
                ? "−"
                : "+";
        });
    });
</script>

</body>
</html>
