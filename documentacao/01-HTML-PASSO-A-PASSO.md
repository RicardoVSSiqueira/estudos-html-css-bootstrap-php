# HTML — explicação passo a passo do projeto Minhas Finanças

Este documento explica a estrutura HTML usada nas cinco páginas reais do projeto. O objetivo é entender a função das tags, atributos, caminhos e identificadores, e não apenas copiar o código.

## 1. Estrutura básica de um documento HTML

Todas as páginas começam com uma estrutura semelhante:

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Minhas Finanças</title>
</head>
<body>
    <!-- Conteúdo que aparece no navegador -->
</body>
</html>
```

Explicando linha por linha:

- `<!DOCTYPE html>`: informa ao navegador que o documento utiliza HTML5.
- `<html lang="pt-br">`: inicia o documento e informa que o idioma principal é português do Brasil. Isso ajuda leitores de tela e mecanismos de busca.
- `<head>`: reúne configurações e referências a arquivos. Seu conteúdo, em geral, não aparece na área principal da página.
- `<meta charset="UTF-8">`: permite exibir corretamente acentos e caracteres especiais.
- `<meta name="viewport"...>`: ajusta a largura da página à tela do dispositivo, importante para celulares.
- `<title>`: define o texto da aba do navegador.
- `<body>`: contém o conteúdo que será exibido ao usuário.

## 2. Arquivos externos no HTML

No `index.html`, o início do `head` importa bibliotecas e o CSS:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/style.css">
```

- `<link>` conecta um arquivo externo ao documento.
- `rel="stylesheet"` informa que o arquivo é uma folha de estilos.
- O primeiro endereço carrega o Bootstrap 4.6.2.
- O segundo carrega a biblioteca Bootstrap Icons.
- O terceiro carrega o CSS criado para o projeto.
- O CSS próprio vem depois do Bootstrap para que as regras do projeto possam personalizar os estilos padrão.

Nas páginas dentro de `paginas/`, o CSS próprio é referenciado assim: `../css/style.css`. Os dois pontos indicam que o navegador deve voltar uma pasta.

## 3. Organização semântica da página

O layout principal usa elementos com funções diferentes:

```html
<div class="app-shell">
    <aside class="sidebar">
        <!-- Menu lateral -->
    </aside>
    <main class="main-area">
        <!-- Conteúdo principal -->
    </main>
</div>
```

- `<div>`: contêiner genérico, usado para agrupar elementos.
- `class="app-shell"`: associa o elemento às regras CSS com essa classe.
- `<aside>`: representa conteúdo complementar, neste caso o menu lateral.
- `<main>`: identifica o conteúdo principal da página.
- As classes não são tags HTML: são nomes que permitem selecionar elementos no CSS e no JavaScript.

## 4. Marca e menu lateral

Exemplo real do menu:

```html
<aside class="sidebar" id="sidebar">
    <a class="brand" href="index.html">
        <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
        <span>Minhas<span class="brand-light">Finanças</span></span>
    </a>

    <nav class="side-nav" aria-label="Menu principal">
        <a href="index.html" class="nav-link active" aria-current="page">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>
        <a href="paginas/gastos.html" class="nav-link">
            <i class="bi bi-cart3"></i> Gastos
        </a>
    </nav>
</aside>
```

- `id="sidebar"`: identificador único usado pelo JavaScript para abrir e fechar o menu no celular.
- `<a>`: cria um link navegável.
- `href="index.html"`: define o destino do link.
- `<span>`: agrupa um trecho de texto sem criar uma seção nova.
- `<i>`: neste projeto, recebe classes do Bootstrap Icons para desenhar ícones.
- `class="active"`: marca visualmente a página atual.
- `<nav>`: identifica uma área de navegação.
- `aria-label`: fornece um nome acessível para a navegação.
- `aria-current="page"`: informa às tecnologias assistivas que aquele link representa a página atual.

Nas páginas que ficam dentro de `paginas/`, os links precisam voltar um nível. Por exemplo, o Dashboard é `../index.html`.

## 5. Cabeçalho da área principal

```html
<header class="topbar">
    <button class="mobile-menu" id="menuToggle" aria-label="Abrir menu">
        <i class="bi bi-list"></i>
    </button>
    <div>
        <p class="topbar-eyebrow">CONTROLE FINANCEIRO PESSOAL</p>
        <h1 id="pageHeading">Dashboard</h1>
    </div>
    <div class="topbar-date">
        <i class="bi bi-calendar3"></i>
        <span id="todayLabel"></span>
    </div>
</header>
```

- `<header>`: representa o cabeçalho.
- `<button>`: cria o botão que abre o menu em telas pequenas.
- `id="menuToggle"`: permite que o JavaScript encontre esse botão.
- `aria-label`: descreve a finalidade do botão para leitores de tela.
- `<p>`: apresenta um texto auxiliar.
- `<h1>`: título principal da página.
- `id="todayLabel"`: local onde o JavaScript escreve a data atual.
- `<span>`: recebe o texto da data sem precisar alterar o restante do cabeçalho.

## 6. Dashboard: cartões de resumo

O Dashboard possui cinco cartões. Um exemplo:

```html
<article class="summary-card">
    <div class="summary-top">
        <span>Entradas</span>
        <i class="bi bi-arrow-down-circle text-green"></i>
    </div>
    <strong id="incomeTotal">R$ 0,00</strong>
    <small>Total recebido</small>
</article>
```

- `<article>`: representa um conteúdo independente, neste caso um cartão de resumo.
- `<div>`: agrupa o título e o ícone.
- `<strong>`: destaca o valor.
- `<small>`: apresenta uma observação menor.
- `id="incomeTotal"`: é o ponto em que o JavaScript coloca o total calculado.
- O valor inicial `R$ 0,00` funciona como conteúdo provisório até o JavaScript atualizar a tela.

Os outros cartões usam a mesma ideia para saldo, gastos, investimentos e dinheiro guardado.

## 7. Gráficos e transações recentes

```html
<canvas id="monthlyChart" aria-label="Gráfico de entradas e gastos"></canvas>
<canvas id="categoryChart" aria-label="Gráfico de gastos por categoria"></canvas>
<div class="transaction-list" id="recentTransactions"></div>
```

- `<canvas>` cria uma área de desenho. A biblioteca Chart.js utiliza essa área para montar os gráficos.
- Cada gráfico precisa de um identificador diferente.
- `aria-label` descreve o conteúdo do gráfico.
- `recentTransactions` é um contêiner vazio que será preenchido pelo JavaScript com os lançamentos mais recentes.

## 8. Página de Gastos

A página `paginas/gastos.html` contém título, botão, busca, filtro e lista:

```html
<div class="section-toolbar">
    <div>
        <h2>Gastos</h2>
        <p id="expenseSubtitle">Total: R$ 0,00</p>
    </div>
    <button class="btn btn-danger" data-toggle="modal" data-target="#expenseModal">
        <i class="bi bi-plus-lg"></i> Nova Despesa
    </button>
</div>

<div class="panel">
    <div class="filter-row">
        <input type="search" class="form-control" id="expenseSearch" placeholder="Buscar despesa...">
        <select class="form-control" id="expenseCategoryFilter">
            <option value="">Todas as categorias</option>
            <option>Alimentação</option>
            <option>Transporte</option>
        </select>
    </div>
    <div id="expenseList" class="record-list"></div>
</div>
```

- `type="search"`: campo de pesquisa.
- `id="expenseSearch"`: permite ao JavaScript ler o texto digitado.
- `<select>`: cria uma lista de opções.
- `<option>`: representa uma opção do filtro.
- `value=""`: indica que nenhuma categoria específica foi escolhida.
- `data-toggle="modal"` e `data-target="#expenseModal"`: atributos usados pelo Bootstrap 4 para abrir o modal identificado por `expenseModal`.
- `expenseList`: contêiner onde os gastos serão inseridos dinamicamente.

## 9. Página de Entradas

A estrutura é parecida com a de Gastos, mas usa identificadores próprios:

- `incomeSubtitle`: total recebido.
- `incomeSearch`: campo de busca.
- `incomeList`: local onde as entradas aparecem.
- `incomeModal` e `incomeForm`: janela e formulário de nova entrada.

Os identificadores são diferentes para evitar que o JavaScript confunda os campos de entrada com os campos de despesa.

## 10. Página de Investimentos

A página utiliza:

- `investmentSubtitle`: total aplicado.
- `investmentList`: contêiner dos cartões de investimento.
- `investmentModal`: janela de cadastro.
- `investmentForm`: formulário de cadastro.

Cada investimento possui nome, tipo, valor aplicado, valor atual e data. A estrutura visual dos cartões é criada pelo JavaScript.

## 11. Página Guardado

A página de metas utiliza:

- `goalSubtitle`: total guardado.
- `goalList`: contêiner das metas.
- `goalModal` e `goalForm`: janela e formulário de nova meta.
- `goalTarget`: valor que se deseja alcançar.
- `goalSaved`: valor que já foi guardado.
- `goalDeadline`: data limite opcional.

A barra de progresso é montada pelo JavaScript com base na relação entre o valor guardado e o valor desejado.

## 12. Formulários e atributos importantes

Exemplo de campo:

```html
<label for="expenseValue">Valor (R$)</label>
<input type="number" min="0.01" step="0.01" id="expenseValue" required>
```

- `<label>`: texto que identifica o campo.
- `for="expenseValue"`: associa o rótulo ao campo com esse ID.
- `type="number"`: aceita valores numéricos.
- `min="0.01"`: define o menor valor permitido pelo navegador.
- `step="0.01"`: permite valores com centavos.
- `id="expenseValue"`: identifica o campo para o JavaScript.
- `required`: exige que o campo seja preenchido antes do envio.

Outros atributos usados:

- `type="date"`: campo de data.
- `type="text"` (padrão): campo de texto.
- `placeholder`: dica exibida quando o campo está vazio.
- `value`: valor inicial do campo.
- `type="submit"`: envia o formulário.
- `type="button"`: botão que não envia o formulário.

## 13. Modais do Bootstrap

Modal é uma janela que aparece sobre a página. O projeto utiliza quatro modais: despesa, entrada, investimento e meta.

A estrutura geral é:

```html
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content app-modal">
            <div class="modal-header">...</div>
            <form id="expenseForm">
                <div class="modal-body">...</div>
                <div class="modal-footer">...</div>
            </form>
        </div>
    </div>
</div>
```

- `modal`: identifica o componente modal do Bootstrap.
- `fade`: aplica uma transição de entrada e saída.
- `id`: identifica qual modal será aberto.
- `tabindex="-1"`: controla a navegação pelo teclado.
- `modal-dialog-centered`: centraliza a janela verticalmente.
- `modal-content`: envolve o conteúdo visual.
- `modal-header`: cabeçalho do modal.
- `modal-body`: área dos campos.
- `modal-footer`: área dos botões.
- `data-dismiss="modal"`: fecha o modal no Bootstrap 4.

Os arquivos de páginas mantêm os quatro modais no HTML. O JavaScript verifica se cada formulário existe antes de adicionar seu evento, então somente o formulário presente naquela página é conectado.

## 14. Carregamento dos scripts

No final do HTML:

```html
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="js/script.js"></script>
```

A ordem é importante:

1. jQuery é carregado antes do JavaScript do Bootstrap 4.
2. Popper é carregado para os componentes que precisam dele.
3. Bootstrap disponibiliza seus componentes.
4. Chart.js disponibiliza a biblioteca de gráficos.
5. Por último, carrega-se o JavaScript do projeto.

Nas páginas dentro de `paginas/`, o caminho final é `../js/script.js`.

## 15. Como estudar o HTML na prática

1. Abra `projeto/index.html`.
2. Localize `<head>` e identifique os arquivos externos.
3. Localize `<aside>` e acompanhe os links do menu.
4. Localize `<main>` e observe o conteúdo específico da página.
5. Abra `paginas/gastos.html` e compare o menu e o cabeçalho.
6. Compare os caminhos `css/style.css` e `../css/style.css`.
7. Localize um formulário e confira se cada `label for` corresponde ao `id` de um campo.
8. Altere temporariamente um título e atualize o navegador para observar o resultado.

## 16. Exercícios

1. Altere o texto do título principal da página de Entradas.
2. Adicione uma nova opção ao filtro de categorias de Gastos.
3. Identifique qual `id` recebe o total de investimentos no Dashboard.
4. Explique por que os links de CSS são diferentes na página inicial e nas páginas dentro da pasta `paginas`.
5. Explique a diferença entre `class` e `id`.
