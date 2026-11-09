# Aula 04 — JavaScript e interações

## Objetivo

Entender como JavaScript permite reagir às ações da pessoa que utiliza o sistema.

## 1. HTML, CSS e JavaScript

- HTML organiza o conteúdo.
- CSS define a aparência.
- JavaScript adiciona comportamentos e interações.

## 2. Arquivo JavaScript

O projeto carrega `assets/js/script.js` no final do `body`:

```html
<script src="assets/js/script.js"></script>
```

Assim, o navegador encontra os elementos HTML antes de executar o arquivo.

## 3. Primeiro teste

No arquivo `assets/js/script.js`, escreva:

```javascript
console.log("Meu primeiro teste com JavaScript");
```

Salve, abra o site e pressione F12 no navegador. Entre na aba Console para ver a mensagem.

## 4. Selecionar um elemento

HTML:

```html
<h1 id="titulo">Dashboard</h1>
```

JavaScript:

```javascript
const titulo = document.getElementById("titulo");
titulo.textContent = "Meu painel financeiro";
```

- `const` cria uma variável que não será reatribuída.
- `getElementById` procura um elemento pelo atributo `id`.
- `textContent` altera o texto do elemento.

## 5. Passo a passo

1. Adicione um `id="titulo"` ao título principal no HTML.
2. No arquivo JavaScript, selecione o título com `getElementById`.
3. Altere o texto usando `textContent`.
4. Atualize o navegador e observe o resultado.
5. Depois, remova o teste ou deixe-o comentado.

## Exercícios

1. Mostre uma mensagem no Console.
2. Altere o texto de um título usando JavaScript.
3. Explique a diferença entre HTML e JavaScript.
4. Pesquise o que é um evento de clique; na próxima prática vamos usá-lo em um botão.

**Desafio:** crie um botão no HTML e, ao clicar nele, altere o texto de um parágrafo. Tente primeiro sozinho.
