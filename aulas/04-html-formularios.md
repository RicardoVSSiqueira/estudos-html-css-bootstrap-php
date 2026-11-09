# Aula 04 — HTML: formulários e campos

**Objetivo:** criar campos para receber dados.

```html
<form>
    <label for="descricao">Descrição</label>
    <input type="text" id="descricao" name="descricao" required>

    <label for="valor">Valor</label>
    <input type="number" id="valor" name="valor" step="0.01" required>

    <button type="submit">Salvar</button>
</form>
```

`form` agrupa os campos; `label` identifica; `for` conecta ao id; `input` recebe informação; `type` define o tipo; `name` identifica o dado enviado; `required` exige preenchimento; `button` cria botão.

Tipos comuns: `text`, `email`, `number`, `date`, `password`.

**Pratique:** crie campos de descrição, valor, data e categoria.

**Exercícios:** diferença entre `id` e `name`? Para que serve `required`? O formulário ainda não grava nada; isso virá depois.