# Aula 14 — JavaScript: DOM e eventos

**Objetivo:** selecionar elementos e reagir a cliques.

HTML:
```html
<p id="mensagem">Nenhuma ação realizada.</p>
<button id="botao">Clique aqui</button>
```

JavaScript:
```javascript
const botao = document.getElementById("botao");
const mensagem = document.getElementById("mensagem");

botao.addEventListener("click", function () {
    mensagem.textContent = "Você clicou!";
});
```

`getElementById` procura pelo id; `addEventListener` escuta um evento; `click` é o evento de clique; `textContent` altera o texto.

**Pratique:** monte o exemplo e clique no botão.

**Exercícios:** o que é evento? Para que serve addEventListener?