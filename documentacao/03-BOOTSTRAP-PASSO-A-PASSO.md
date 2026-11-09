# Bootstrap 4.6 — explicação passo a passo no projeto Minhas Finanças

## 1. O que é Bootstrap?

Bootstrap é um framework CSS que oferece classes prontas para construir interfaces. No projeto, ele ajuda a criar botões, formulários, organização em colunas e janelas modais sem precisar escrever tudo do zero.

O projeto utiliza especificamente a versão **4.6.2**. É importante não misturar exemplos de Bootstrap 5 com este código, pois alguns atributos e dependências mudaram entre as versões.

## 2. Como o Bootstrap é carregado?

Dentro do `<head>`:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
```

O navegador baixa a folha de estilos do Bootstrap pelo CDN. Para isso funcionar, é necessário ter conexão com a internet.

## 3. Classes de layout usadas nos formulários

### `form-group`

Agrupa o rótulo e o campo, criando espaçamento entre campos:

```html
<div class="form-group">
    <label for="expenseName">Nome</label>
    <input class="form-control" id="expenseName" required>
</div>
```

### `form-control`

Aplica o estilo padrão do Bootstrap a campos de texto, número, data e seletores:

```html
<input class="form-control" type="number" id="expenseValue">
<select class="form-control" id="expenseCategory">...</select>
```

### `form-row` e colunas

```html
<div class="form-row">
    <div class="form-group col-6">
        <label for="expenseValue">Valor</label>
        <input class="form-control" id="expenseValue">
    </div>
    <div class="form-group col-6">
        <label for="expenseDate">Data</label>
        <input class="form-control" id="expenseDate">
    </div>
</div>
```

- `form-row` organiza campos em uma linha com espaçamento próprio para formulários.
- `col-6` ocupa metade da largura da linha.
- Duas colunas `col-6` dividem a linha em duas metades.

## 4. Botões

O projeto combina a classe base `btn` com classes de cor:

```html
<button class="btn btn-danger">Nova Despesa</button>
<button class="btn btn-success">Nova Entrada</button>
<button class="btn btn-primary">Novo Investimento</button>
<button class="btn btn-purple">Nova Meta</button>
```

- `btn` fornece a estrutura visual de botão.
- `btn-danger` é uma classe do Bootstrap para ação de destaque vermelho.
- `btn-success` é verde.
- `btn-primary` é azul.
- `btn-purple` é uma classe criada no CSS do projeto, não uma classe padrão do Bootstrap.

## 5. Sistema de modal no Bootstrap 4

Um modal é uma janela sobreposta à tela. No projeto, o botão de nova despesa abre o modal:

```html
<button class="btn btn-danger"
        data-toggle="modal"
        data-target="#expenseModal">
    Nova Despesa
</button>
```

- `data-toggle="modal"` informa que o botão controla um modal.
- `data-target="#expenseModal"` aponta para o elemento cujo ID é `expenseModal`.
- O símbolo `#` indica que o destino é um ID.

O modal precisa ter o mesmo identificador:

```html
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content app-modal">
            ...
        </div>
    </div>
</div>
```

Partes:
- `modal`: componente principal.
- `fade`: animação de entrada e saída.
- `modal-dialog`: caixa que posiciona a janela.
- `modal-dialog-centered`: centraliza verticalmente.
- `modal-content`: conteúdo visual.
- `modal-header`: título e botão de fechar.
- `modal-body`: campos do formulário.
- `modal-footer`: botões de cancelar e salvar.

Para fechar um modal no Bootstrap 4, o botão usa `data-dismiss="modal"`.

## 6. Dependências JavaScript do Bootstrap 4

No final do HTML, o projeto carrega:

```html
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
```

A ordem deve ser mantida:
1. jQuery;
2. Popper;
3. JavaScript do Bootstrap.

O código do projeto fecha os modais com a chamada jQuery:

```javascript
$("#" + modalId).modal("hide");
```

O seletor `#` localiza o elemento pelo ID e `modal("hide")` pede ao Bootstrap para fechar a janela.

## 7. Bootstrap Icons

Os ícones são carregados separadamente:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
```

Exemplo:

```html
<i class="bi bi-cart3"></i>
```

- `bi` ativa a família de ícones.
- `bi-cart3` escolhe o desenho de carrinho.
- O ícone é exibido junto ao texto do link.

Outros exemplos usados no projeto incluem `bi-wallet2`, `bi-grid-1x2-fill`, `bi-arrow-down-circle`, `bi-graph-up-arrow` e `bi-piggy-bank`.

## 8. Chart.js não é Bootstrap

Os gráficos são feitos com outra biblioteca, Chart.js. O Bootstrap não desenha esses gráficos. O HTML disponibiliza os elementos `canvas`, e o JavaScript configura Chart.js.

## 9. Como testar os componentes

1. Abra `paginas/gastos.html`.
2. Clique em **Nova Despesa**.
3. Confira se o modal aparece.
4. Clique em **Cancelar** e veja se fecha.
5. Abra novamente e teste o botão de fechar no cabeçalho.
6. Reduza a largura do navegador e teste o menu lateral.

## 10. Exercícios

1. Explique o que faz `data-toggle="modal"`.
2. Qual a relação entre `data-target="#expenseModal"` e `id="expenseModal"`?
3. Qual a diferença entre `btn-success` e `btn-purple` neste projeto?
4. Por que jQuery é carregado antes do Bootstrap 4?
