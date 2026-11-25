
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda | Viby</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #121212;
            color: #fff;
        }

        header {
            background: #1c1c1c;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #333;
        }

        .logo {
            color: #FF7A00;
            font-size: 28px;
            font-weight: bold;
            text-decoration: none;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
        }

        nav a:hover {
            color: #FF7A00;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .titulo {
            text-align: center;
            margin-bottom: 40px;
        }

        .titulo h1 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .titulo span {
            color: #FF7A00;
        }

        .titulo p {
            color: #aaa;
            line-height: 1.6;
        }

        .secao {
            background: #1c1c1c;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 1px solid #303030;
        }

        .secao h2 {
            color: #FF7A00;
            margin-bottom: 15px;
            font-size: 21px;
        }

        .secao p {
            color: #ccc;
            line-height: 1.7;
        }

        .pergunta {
            border-bottom: 1px solid #333;
        }

        .pergunta:last-child {
            border-bottom: none;
        }

        .pergunta button {
            width: 100%;
            background: none;
            border: none;
            color: #fff;
            padding: 18px 0;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
        }

        .pergunta button:hover {
            color: #FF7A00;
        }

        .resposta {
            display: none;
            color: #aaa;
            line-height: 1.6;
            padding: 0 0 18px;
        }

        .pergunta.ativa .resposta {
            display: block;
        }

        .contato {
            text-align: center;
        }

        .contato a {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 25px;
            background: #FF7A00;
            color: #121212;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
        }

        .contato a:hover {
            background: #e66e00;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #777;
            border-top: 1px solid #333;
            margin-top: 50px;
        }

        @media (max-width: 600px) {
            header {
                flex-direction: column;
                gap: 18px;
            }

            nav a {
                margin: 0 8px;
            }

            .titulo h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<header>
    <a href="index.php" class="logo">VIBY.</a>

    <nav>
        <a href="index.php">Início</a>
        <a href="botecos.php">Explorar</a>
        <a href="ajuda.php">Ajuda</a>
    </nav>
</header>

<main class="container">

    <div class="titulo">
        <h1>Central de <span>Ajuda</span></h1>
        <p>
            Encontre respostas para suas dúvidas e descubra como aproveitar
            melhor as experiências disponíveis no Viby.
        </p>
    </div>

    <section class="secao">
        <h2>O que é o Viby?</h2>
        <p>
            O Viby é uma plataforma criada para ajudar você a descobrir
            lugares e experiências na sua cidade. Encontre bares, restaurantes,
            cafés, lanchonetes e outros estabelecimentos de acordo com suas
            preferências.
        </p>
    </section>

    <section class="secao">
        <h2>Como encontrar lugares?</h2>
        <p>
            Na página inicial, você pode explorar os estabelecimentos
            disponíveis e utilizar as categorias para encontrar opções
            de acordo com o que está procurando.
        </p>
    </section>

    <section class="secao">
        <h2>Como consultar um estabelecimento?</h2>
        <p>
            Ao encontrar um lugar interessante, clique em "Ver estabelecimento"
            para consultar informações como descrição, localização,
            contato e cardápio.
        </p>
    </section>

    <section class="secao">
        <h2>Perguntas frequentes</h2>

        <div class="pergunta">
            <button type="button">
                O Viby é gratuito?
                <span>+</span>
            </button>
            <div class="resposta">
                Sim. A proposta do Viby é permitir que os usuários explorem
                estabelecimentos e descubram novas experiências.
            </div>
        </div>

        <div class="pergunta">
            <button type="button">
                Como encontro estabelecimentos próximos?
                <span>+</span>
            </button>
            <div class="resposta">
                Você pode explorar as opções disponíveis e utilizar os recursos
                de busca e categorias para encontrar lugares de seu interesse.
            </div>
        </div>

        <div class="pergunta">
            <button type="button">
                Como faço para cadastrar meu estabelecimento?
                <span>+</span>
            </button>
            <div class="resposta">
                Acesse a opção de cadastro de estabelecimento disponível
                na plataforma e preencha as informações solicitadas.
            </div>
        </div>

        <div class="pergunta">
            <button type="button">
                O cardápio apresenta os preços dos produtos?
                <span>+</span>
            </button>
            <div class="resposta">
                Os estabelecimentos podem disponibilizar seus itens de
                cardápio com descrições e preços para consulta dos usuários.
            </div>
        </div>

    </section>

    <section class="secao contato">
        <h2>Ainda precisa de ajuda?</h2>
        <p>
            Entre em contato conosco para esclarecer suas dúvidas.
        </p>

        <a href="index.php">Voltar ao início</a>
    </section>

</main>

<footer>
    © 2026 VIBY — Encontre sua vibe.
</footer>

<script>
    const perguntas = document.querySelectorAll(".pergunta button");

    perguntas.forEach(botao => {
        botao.addEventListener("click", () => {
            const pergunta = botao.parentElement;
            const aberta = pergunta.classList.toggle("ativa");

            botao.querySelector("span").textContent = aberta ? "−" : "+";
        });
    });
</script>

</body>
</html>
