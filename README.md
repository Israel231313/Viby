# Viby – Encontre sua vibe

## Sobre o projeto

O Viby é uma aplicação web desenvolvida com o objetivo de facilitar a descoberta de estabelecimentos e experiências na cidade. A proposta é reunir informações sobre bares e outros locais, permitindo que o usuário encontre opções de acordo com seus interesses.

O projeto foi desenvolvido como atividade acadêmica do curso de Análise e Desenvolvimento de Sistemas do Senac.

## Funcionalidades

- Cadastro de usuários.
- Cadastro de estabelecimentos.
- Login de usuários e estabelecimentos.
- Visualização de estabelecimentos.
- Consulta de perfis.
- Área de gerenciamento do estabelecimento.
- Gerenciamento de cardápios.
- Cadastro, consulta, edição e exclusão de cardápios e itens.
- Página de ajuda.

## Tecnologias utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- PDO
- XAMPP
- Git e GitHub

## Organização do projeto

O projeto utiliza conceitos de Programação Orientada a Objetos (POO).

Os módulos de gerenciamento de cardápios e itens de cardápio foram organizados seguindo o padrão MVC (Model-View-Controller), com separação de responsabilidades:

- **Classes:** representam os objetos do sistema.
- **Controllers:** recebem e controlam as operações solicitadas.
- **DAO:** concentra as operações de acesso ao banco de dados.
- **Views:** apresentam as informações ao usuário.

## Banco de dados

O projeto utiliza MySQL e possui o script `database_viby.sql` para criação e preenchimento inicial do banco de dados.

### Como executar o projeto

1. Instale e abra o XAMPP.
2. Inicie os serviços Apache e MySQL.
3. Copie a pasta do projeto para o diretório `htdocs`.
4. Acesse o phpMyAdmin.
5. Crie um banco de dados chamado `viby`.
6. Importe o arquivo `database_viby.sql`.
7. Confira as configurações de conexão no arquivo `config/conexao.php`, ajustando host, usuário e senha conforme o ambiente local.
8. Acesse o projeto pelo navegador:

   `http://localhost/Viby/`

## Autor

**Israel Bandeira**

Curso: Análise e Desenvolvimento de Sistemas – Senac.

Projeto desenvolvido individualmente.

## Utilização de inteligência artificial

O ChatGPT foi utilizado como ferramenta de apoio durante o desenvolvimento do projeto. Auxiliou na criação e revisão de códigos, organização da estrutura MVC, resolução de erros e compreensão dos conceitos de programação. O código gerado ou sugerido foi analisado, adaptado e testado durante a implementação do projeto.

## Demonstração

Serão adicionadas capturas de tela da aplicação e demonstrações das funcionalidades desenvolvidas.
