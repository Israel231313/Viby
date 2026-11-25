
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botecos | Viby</title>
    <link rel="stylesheet" href="style.css?v=2">

    <style>
        .paginaBotecos {
            max-width: 1100px;
            margin: auto;
            padding: 35px 20px;
            color: white;
        }

        .topoBotecos {
            margin-bottom: 30px;
        }

        .topoBotecos a {
            color: #FF7A00;
            text-decoration: none;
        }

        .topoBotecos h1 {
            margin-top: 25px;
            font-size: 30px;
        }

        .topoBotecos p {
            color: #AAA;
            margin-top: 10px;
        }

        .listaBotecos {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .cardBoteco {
            background: #1C1C1C;
            border: 1px solid #353535;
            border-radius: 14px;
            overflow: hidden;
        }

        .cardBoteco img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .infoBoteco {
            padding: 20px;
        }

        .infoBoteco h2 {
            margin-bottom: 10px;
        }

        .infoBoteco p {
            color: #AAA;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .infoBoteco span {
            color: #FF7A00;
            font-size: 13px;
        }

        .botaoVerBoteco {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 20px;
            background: #FF7A00;
            color: #000;
            text-decoration: none;
            border-radius: 7px;
            font-weight: bold;
        }

        .botaoVerBoteco:hover {
            background: #e66d00;
        }

        .avisoBotecos {
            color: #777;
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
        }

        @media (max-width: 650px) {
            .listaBotecos {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<main class="paginaBotecos">

    <div class="topoBotecos">
        <a href="index.php">← Voltar para o início</a>

        <h1>Botecos em destaque</h1>

        <p>
            Encontre um lugar para reunir os amigos,
            aproveitar bons petiscos e curtir a noite.
        </p>
    </div>

    <section class="listaBotecos">

        <article class="cardBoteco">
            <img src="img/categorias/bares.jpg" alt="Estação 27 Gastrobar">

            <div class="infoBoteco">
                <span>GASTROBAR</span>
                <h2>Estação 27 Gastrobar</h2>

                <p>
                    Ambiente descontraído, hambúrgueres, porções,
                    drinks e música ao vivo.
                </p>

                <p>📍 Centro – Ponta Grossa</p>

                <a href="visualizar-estabelecimento.php" class="botaoVerBoteco">
                    Ver estabelecimento →
                </a>
            </div>
        </article>

        <article class="cardBoteco">
            <img src="img/categorias/botecos.jpg" alt="Boteco do Centro">

            <div class="infoBoteco">
                <span>BOTECO</span>
                <h2>Boteco do Centro</h2>

                <p>
                    Um ambiente casual para aproveitar cervejas,
                    porções tradicionais e bons momentos com os amigos.
                </p>

                <p>📍 Centro – Ponta Grossa</p>

                <span>Estabelecimento demonstrativo</span>

                <a href="visualizar-estabelecimento.php" class="botaoVerBoteco">
                    Ver estabelecimento →
                </a>
            </div>
        </article>

    </section>

    <p class="avisoBotecos">
        Os estabelecimentos apresentados são demonstrativos.
    </p>

</main>

</body>
</html>
