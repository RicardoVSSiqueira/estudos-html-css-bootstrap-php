# Aula 01 — Construindo o HTML do Minhas Finanças

Nesta aula vamos entender e montar a estrutura HTML do projeto. O arquivo que você deve abrir no VS Code é **`projeto/index.html`**. Não comece pelo CSS nem pelo JavaScript: primeiro entenda a estrutura da página.

## 1. Criar o documento HTML

O início do arquivo é:

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Finanças</title>
</head>
<body>
</body>
</html>
```

Explicação linha por linha:

- `<!DOCTYPE html>`: informa ao navegador que o documento usa HTML5.
- `<html lang="pt-br">`: abre o documento e informa que o idioma principal é português do Brasil.
- `<head>`: guarda configurações e referências de arquivos; não é o conteúdo visual principal.
- `<meta charset="UTF-8">`: permite mostrar acentos, cedilha e símbolos corretamente.
- `<meta name="viewport"...>`: faz a largura da página acompanhar a largura da tela, essencial para celular.
- `<title>`: texto que aparece na aba do navegador.
- `<body>`: tudo que aparece na página fica dentro dele.

## 2. Conectar Bootstrap, ícones e CSS

No projeto real, dentro do `<head>`, usamos:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/style.css">
```

- A primeira linha carrega o Bootstrap 4.6.2. Ele oferece classes prontas para botões, formulários, grid e modais.
- A segunda carrega Bootstrap Icons. Por exemplo, `<i class="bi bi-wallet2"></i>` mostra um ícone de carteira.
- A terceira carrega nosso CSS. Ela vem por último para que nossas regras possam personalizar o Bootstrap.

## 3. Criar a estrutura geral e a sidebar

Trecho do arquivo:

```html
<div class="app-shell">
    <aside class="sidebar" id="sidebar">
        <a class="brand" href="#" data-page="dashboard">
            <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
            <span>Minhas<span class="brand-light">Finanças</span></span>
        </a>

        <nav class="side-nav" aria-label="Menu principal">
            <a href="#dashboard" class="nav-link active" data-page="dashboard">Dashboard</a>
            <a href="#gastos" class="nav-link" data-page="gastos">Gastos</a>
            <a href="#entradas" class="nav-link" data-page="entradas">Entradas</a>
            <a href="#investimentos" class="nav-link" data-page="investimentos">Investimentos</a>
            <a href="#guardado" class="nav-link" data-page="guardado">Guardado</a>
        </nav>
    </aside>
</div>
```

- `div.app-shell`: envolve o aplicativo inteiro.
- `aside`: representa conteúdo lateral, neste caso o menu.
- `id="sidebar"`: identifica a sidebar para o JavaScript conseguir abri-la e fechá-la no celular.
- `a.brand`: marca/nome do sistema e atalho para o Dashboard.
- `span`: agrupa pequenos trechos de texto ou ícone.
- `nav`: identifica semanticamente a área de navegação.
- `aria-label`: dá um nome acessível à navegação para leitores de tela.
- `data-page`: atributo personalizado. O JavaScript lê seu valor para saber qual seção mostrar.
- `active`: indica qual opção começa selecionada.

No código real os ícones também estão presentes nos links. Foram abreviados neste exemplo para facilitar a leitura; não apague os ícones do arquivo completo.

## 4. Criar o cabeçalho e a área principal

```html
<main class="main-area">
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
</main>
```

- `main`: conteúdo principal e único da página.
- `header`: cabeçalho da área principal.
- O botão `menuToggle` será usado no celular para abrir a sidebar.
- `pageHeading` é atualizado quando o usuário troca de seção.
- `todayLabel` recebe a data atual por JavaScript.

## 5. Construir os cartões do Dashboard

Cada resumo usa um elemento `article`:

```html
<article class="summary-card">
    <div class="summary-top">
        <span>Entradas</span>
        <i class="bi bi-arrow-down-circle"></i>
    </div>
    <strong id="incomeTotal">R$ 0,00</strong>
    <small>Total recebido</small>
</article>
```

- `article`: bloco independente de conteúdo.
- `summary-card`: classe que o CSS usa para desenhar o cartão.
- `span`: rótulo do indicador.
- `i`: ícone do Bootstrap Icons.
- `strong`: destaca o valor principal.
- `id="incomeTotal"`: permite ao JavaScript substituir o valor de exemplo.
- `small`: texto auxiliar.

No HTML completo existem cinco cartões: saldo geral, entradas, gastos, investido e guardado.

## 6. Criar espaços para os gráficos

```html
<canvas id="monthlyChart"></canvas>
<canvas id="categoryChart"></canvas>
```

`canvas` cria uma área de desenho. O Chart.js, carregado no final do HTML, desenha os gráficos dentro dela. O HTML reserva o espaço; o JavaScript fornece os dados e configura o gráfico.

## 7. Criar as outras telas

O projeto usa uma seção para cada opção do menu:

```html
<section class="page-section active" id="page-dashboard">
    <!-- conteúdo do Dashboard -->
</section>

<section class="page-section" id="page-gastos">
    <!-- conteúdo de Gastos -->
</section>

<section class="page-section" id="page-entradas">
    <!-- conteúdo de Entradas -->
</section>
```

A mesma lógica continua para Investimentos e Dinheiro Guardado. A classe `active` faz o Dashboard começar visível. As demais seções começam escondidas pelo CSS. O JavaScript alterna essa classe quando clicamos na sidebar.

## 8. Formulários em janelas modais

Exemplo reduzido:

```html
<div class="modal fade" id="expenseModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="expenseForm">
                <div class="modal-body">
                    <label for="expenseName">Nome</label>
                    <input class="form-control" id="expenseName" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
```

- `modal fade`: estrutura de janela modal do Bootstrap.
- `id="expenseModal"`: nome usado pelo botão para abrir a janela.
- `modal-dialog` e `modal-content`: organizam a caixa.
- `form`: agrupa os campos que serão enviados.
- `label for`: associa o texto ao campo que possui o mesmo id.
- `input required`: campo obrigatório.
- `type="submit"`: envia o formulário para o evento JavaScript.

O arquivo completo possui quatro modais: despesa, entrada, investimento e meta. Leia cada um comparando os campos e seus respectivos IDs.

## 9. Carregar os scripts na ordem correta

No final do `body`:

```html
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="js/script.js"></script>
```

Bootstrap 4.6 depende de jQuery e Popper para alguns componentes, como modais. Chart.js desenha os gráficos. Nosso `script.js` fica por último porque utiliza elementos HTML e bibliotecas já carregadas.

## 10. Exercícios antes de avançar

1. Localize no HTML as cinco opções da sidebar.
2. Encontre o cartão que mostra o saldo geral.
3. Identifique o formulário de cadastro de entrada.
4. Altere o texto do título da página e veja a mudança no navegador.
5. Explique com suas palavras a diferença entre `class` e `id`.

**Critério para avançar:** você deve conseguir localizar cada parte do HTML e explicar para que servem `aside`, `nav`, `main`, `section`, `article`, `form`, `label` e `input`.
