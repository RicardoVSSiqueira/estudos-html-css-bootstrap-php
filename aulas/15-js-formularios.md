# Aula 15 — JavaScript: formulários e validação

**Objetivo:** ler campos e validar informações no navegador.

```javascript
formulario.addEventListener("submit", function (evento) {
    evento.preventDefault();

    if (descricao.value === "") {
        retorno.textContent = "Informe a descrição.";
    } else {
        retorno.textContent = "Descrição preenchida!";
    }
});
```

`submit` ocorre ao enviar; `preventDefault()` impede o envio padrão; `value` lê o campo; `if/else` escolhe o caminho.

**Pratique:** crie um formulário com descrição e valor. Mostre uma mensagem quando a descrição estiver vazia.

**Exercícios:** por que usamos preventDefault? Por que a validação também será necessária no PHP?