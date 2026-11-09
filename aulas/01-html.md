# Aula 01 — Estrutura básica do HTML

## Objetivo

Entender como o navegador recebe a estrutura de uma página. Nesta aula vamos reconhecer as partes principais do arquivo `index.php`. Apesar da extensão PHP, o conteúdo atual da página é principalmente HTML.

## 1. O que é HTML?

HTML é a linguagem de marcação usada para organizar o conteúdo da página. Ela indica ao navegador o que é título, parágrafo, menu, imagem, botão e outras partes.

HTML não é responsável por deixar a página bonita. A aparência será trabalhada com CSS.

## 2. Estrutura mínima

Crie um arquivo chamado `teste.html` e digite:

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha primeira página</title>
</head>
<body>
    <h1>Minhas Finanças</h1>
    <p>Estou aprendendo a desenvolver meu sistema.</p>
</body>
</html>
```

## 3. Entenda cada parte

- `<!DOCTYPE html>`: informa que o documento usa HTML5.
- `<html lang="pt-br">`: elemento principal; informa que o idioma é português do Brasil.
- `<head>`: guarda configurações e informações da página.
- `<meta charset="UTF-8">`: permite exibir acentos e caracteres especiais corretamente.
- `<meta name="viewport"...>`: ajuda a página a se adaptar à largura da tela.
- `<title>`: texto exibido na aba do navegador.
- `<body>`: conteúdo que aparece na página.
- `<h1>`: título principal.
- `<p>`: parágrafo.

## 4. Tags usadas no painel

No arquivo `index.php`, procure estas tags:

- `<header>`: cabeçalho da página.
- `<aside>`: conteúdo lateral, usado no menu.
- `<nav>`: área de navegação.
- `<main>`: conteúdo principal.
- `<section>`: agrupa uma seção relacionada.
- `<article>`: representa um bloco independente, como um cartão de resumo.
- `<div>`: agrupamento genérico.
- `<a>`: link.
- `<i>`: neste projeto, é usado pelas classes dos ícones do Bootstrap Icons.

Essas tags ajudam a organizar o documento. Elas não criam, sozinhas, o estilo visual.

## 5. Passo a passo no projeto

1. Abra o arquivo `index.php`.
2. Localize o início do documento e encontre `<head>`.
3. Identifique o título da aba.
4. Localize `<body>`.
5. Encontre `<aside class="sidebar">`; essa é a área do menu lateral.
6. Encontre `<main class="conteudo">`; essa é a área principal.
7. Dentro de `<main>`, localize os cartões dentro de `<section class="resumo">`.
8. Altere temporariamente o texto de um cartão e atualize o navegador para observar a mudança.

## Exercícios

1. Altere o texto do título principal de Dashboard para Meu painel.
2. Adicione um parágrafo abaixo do título com o texto: Este é meu controle financeiro.
3. Crie um novo cartão usando `<article>` e um título com `<h2>`.
4. Explique a diferença entre `<head>` e `<body>`.

**Desafio:** tente identificar no arquivo onde começa e termina o menu lateral e onde começa o conteúdo principal.

## Revisão

Antes de avançar, tente responder sem consultar o texto: qual tag contém o conteúdo visível da página? Qual tag representa o título principal? Para que serve `<section>`?
