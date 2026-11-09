# Aula 03 — Onde e por que usamos Bootstrap 4.6

O projeto utiliza Bootstrap **4.6.2**. O arquivo principal é `projeto/index.html`; não existe um segundo arquivo Bootstrap para escrever.

## 1. Carregar a biblioteca

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
```

A tag `link` importa o CSS do Bootstrap. O navegador baixa a biblioteca pelo CDN quando há conexão com a internet.

## 2. Botões

```html
<button class="btn btn-danger">Nova Despesa</button>
<button class="btn btn-success">Nova Entrada</button>
<button class="btn btn-primary">Novo Investimento</button>
```

- `btn` aplica a aparência base de botão.
- `btn-danger` aplica o estilo vermelho.
- `btn-success` aplica o estilo verde.
- `btn-primary` aplica o estilo principal azul.

O CSS do projeto personaliza alguns desses estilos para combinar com a interface.

## 3. Campos de formulário

```html
<input class="form-control" type="text" placeholder="Descrição">
<select class="form-control">
    <option>PIX</option>
    <option>Dinheiro</option>
</select>
```

A classe `form-control` deixa input e select com altura, largura, borda e espaçamento padronizados.

## 4. Organizar campos em colunas

```html
<div class="form-row">
    <div class="form-group col-6">
        <label>Valor</label>
        <input class="form-control" type="number">
    </div>
    <div class="form-group col-6">
        <label>Data</label>
        <input class="form-control" type="date">
    </div>
</div>
```

- `form-row` cria uma linha própria para campos de formulário.
- `form-group` agrupa rótulo e campo.
- `col-6` ocupa metade da linha em telas pequenas e maiores.
- Os dois campos dividem a linha.

## 5. Modal

O projeto usa o componente modal do Bootstrap 4:

```html
<button class="btn btn-danger" data-toggle="modal" data-target="#expenseModal">
    Nova Despesa
</button>
```

- `data-toggle="modal"` informa ao Bootstrap que o botão abre um modal.
- `data-target="#expenseModal"` aponta para o elemento cujo id é `expenseModal`.

O modal precisa ter a mesma identificação:

```html
<div class="modal fade" id="expenseModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- cabeçalho, formulário e rodapé -->
        </div>
    </div>
</div>
```

## 6. Dependências JavaScript do Bootstrap 4

No final do HTML são carregados jQuery, Popper e Bootstrap JS, nesta ordem. O Bootstrap 4 usa essas dependências para componentes interativos como o modal.

**Atenção:** Bootstrap 5 mudou atributos e dependências. Não troque `data-toggle` por exemplos de Bootstrap 5 no meio deste projeto.

## Exercícios

1. Localize os quatro botões que abrem os modais.
2. Localize a classe `form-control` em todos os formulários.
3. Mude um botão de `btn-danger` para `btn-primary`.
4. Explique a função de `data-target`.
