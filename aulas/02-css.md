# Aula 02 — CSS: cores, espaços e layout

## Objetivo

Aprender como o CSS controla a aparência do HTML e entender o arquivo `assets/css/style.css`.

## 1. O que é CSS?

CSS significa Cascading Style Sheets. É usado para definir cores, fontes, tamanhos, espaçamentos, bordas e posicionamento dos elementos.

No projeto, o arquivo CSS é conectado ao HTML por esta linha dentro do `<head>`:

```html
<link rel="stylesheet" href="assets/css/style.css">
```

O atributo `href` indica o caminho do arquivo.

## 2. Como ler uma regra CSS

```css
body {
    background: #080d18;
    color: #f4f6fb;
    font-family: Arial, sans-serif;
}
```

- `body` é o seletor: escolhe quais elementos serão estilizados.
- `background` define o fundo.
- `color` define a cor do texto.
- `font-family` define a família da fonte.
- As chaves agrupam as declarações.
- Cada declaração termina com ponto e vírgula.

## 3. Classes

No HTML encontramos, por exemplo:

```html
<main class="conteudo">
```

No CSS, a classe é selecionada com ponto:

```css
.conteudo {
    padding: 30px;
}
```

A propriedade `padding` cria espaço interno entre o conteúdo e a borda do elemento.

## 4. Espaçamentos importantes

- `margin`: espaço externo ao redor do elemento.
- `padding`: espaço interno do elemento.
- `gap`: espaço entre itens de um layout flex ou grid.
- `border`: borda do elemento.

## 5. Entenda o layout do projeto

Procure no CSS:

- `.layout`: usa `display: flex` para colocar o menu e o conteúdo lado a lado.
- `.sidebar`: define a largura e o fundo do menu lateral.
- `.conteudo`: define a área principal.
- `.resumo`: usa CSS Grid para distribuir os cartões.
- `@media`: altera regras conforme a largura da tela, ajudando na responsividade.

## 6. Prática guiada

1. Abra `assets/css/style.css`.
2. Localize a regra `body`.
3. Troque temporariamente a cor de fundo por `#101827`.
4. Salve e atualize o navegador.
5. Volte à cor original.
6. Localize `.card-resumo` e aumente o `padding` de 18px para 24px.
7. Observe o espaço interno dos cartões.

## Exercícios

1. Mude a cor do título principal.
2. Aumente o espaço entre os cartões usando `gap`.
3. Altere a borda de um cartão.
4. Explique com suas palavras a diferença entre `margin` e `padding`.

**Desafio:** encontre uma regra `@media` e explique em qual tamanho de tela ela começa a valer.
