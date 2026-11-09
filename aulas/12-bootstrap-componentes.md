# Aula 12 — Bootstrap: botões e formulários

**Objetivo:** estilizar controles usando classes prontas.

```html
<button class="btn btn-primary">Salvar</button>
<button class="btn btn-success">Entrada</button>
<button class="btn btn-danger">Gasto</button>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <input type="text" class="form-control" id="descricao">
</div>
```

`btn` é a classe base; as outras classes definem variações; `form-group` agrupa o campo; `form-control` estiliza o input.

**Pratique:** monte um formulário visual para registrar um gasto.

**Exercícios:** crie um botão secundário e um campo de e-mail. Compare o input com e sem `form-control`.