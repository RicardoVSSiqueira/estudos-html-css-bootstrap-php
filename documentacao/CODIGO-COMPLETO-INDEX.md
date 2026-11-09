# Dashboard — projeto/index.html

Esta é a página inicial do sistema. Ela apresenta o resumo financeiro, os cartões com totais, os elementos canvas dos gráficos e a área das transações recentes.

## Como ler este arquivo

Estude os trechos apresentados em cada bloco. O código aparece dividido em partes menores, seguido da explicação das linhas correspondentes. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. DOCTYPE e elemento html: definem o documento HTML5 e o idioma.
2. Head: contém charset, viewport, título, bibliotecas externas e CSS próprio.
3. Sidebar: contém a marca e os links para cada arquivo HTML. O link da página atual recebe a classe active.
4. Topbar: contém o botão de menu para celular, o título e o espaço em que o JavaScript escreve a data.
5. Resumo financeiro: os elementos com IDs como balanceTotal, incomeTotal e expenseTotal são preenchidos pelo JavaScript.
6. Gráficos: os elementos canvas monthlyChart e categoryChart são utilizados pelo Chart.js.
7. Transações recentes: o contêiner recentTransactions é preenchido dinamicamente.
8. Scripts: jQuery, Popper, Bootstrap, Chart.js e o JavaScript do projeto são carregados no final, na ordem necessária.

## Explicação detalhada de cada bloco do HTML

### Bloco 1 — início do documento e configurações (`<!DOCTYPE>`, `html` e `head`)
`<!DOCTYPE html>` informa ao navegador que o documento segue o padrão HTML5. A tag `html` envolve toda a página e o atributo `lang="pt-br"` declara que o conteúdo está em português brasileiro. Dentro de `head` ficam configurações que não aparecem como conteúdo principal: `charset="UTF-8"` permite exibir corretamente acentos; `viewport` faz o layout respeitar a largura do celular; `title` define o texto da aba do navegador.

### Bloco 2 — importação de estilos e bibliotecas
Os links para Bootstrap e Bootstrap Icons carregam recursos prontos pela internet (CDN). Bootstrap oferece classes para organizar colunas, botões, formulários e modais. Bootstrap Icons fornece os ícones usados na interface. O link para `css/style.css` carrega as regras próprias do projeto. Manter o CSS próprio depois do Bootstrap permite sobrescrever estilos da biblioteca quando necessário.

### Bloco 3 — estrutura geral da aplicação
O `body` contém o que o visitante vê. O contêiner principal organiza duas áreas: a navegação lateral e a área de conteúdo. Classes como `app-shell`, `sidebar` e `main-area` não têm comportamento especial no HTML: elas são nomes que o CSS utiliza para aplicar layout, cores e espaçamentos.

### Bloco 4 — menu lateral (`aside` e `nav`)
`aside` representa uma área complementar, aqui usada como menu. A marca leva à página inicial. Dentro de `nav`, cada `a` é um link para outro arquivo HTML: os caminhos apontam para Gastos, Entradas, Investimentos e Guardado. A classe `active` destaca o item atual visualmente. `aria-current="page"` informa às tecnologias assistivas que esse é o link da página aberta. Os atributos `id` identificam elementos que o JavaScript precisa localizar, como o menu e o controle de limpar os dados.

### Bloco 5 — área principal e cabeçalho
`main` identifica o conteúdo principal. O cabeçalho superior agrupa o botão de menu para dispositivos menores, a identificação do sistema, o título da página e a data. O botão tem um ID para que o JavaScript escute o clique. O elemento da data começa com conteúdo vazio porque o script coloca nele a data atual.

### Bloco 6 — cartões de indicadores financeiros
A grade de resumo agrupa cartões independentes. Cada cartão apresenta um rótulo, um ícone e um valor. Os IDs dos valores, por exemplo `balanceTotal`, `incomeTotal` e `expenseTotal`, são pontos de conexão com o JavaScript. O HTML cria o espaço onde o valor será mostrado; o JavaScript calcula o total e altera o texto do elemento. Os cartões não fazem cálculos por conta própria.

### Bloco 7 — painéis e gráficos
Os painéis organizam o título, uma pequena explicação e o espaço do gráfico. A tag `canvas` cria uma área de desenho. O Chart.js utiliza esse canvas para desenhar os gráficos; por isso os IDs precisam coincidir com os procurados no JavaScript. Se mudar um ID no HTML, também será necessário mudar a referência correspondente no script.

### Bloco 8 — transações recentes
O contêiner de transações começa vazio. Isso é intencional: a função JavaScript responsável consulta as despesas e entradas, organiza os registros por data e cria os elementos que serão exibidos. O HTML fornece apenas o local onde esses elementos serão inseridos.

### Bloco 9 — modais e formulários
Cada modal é uma janela de cadastro. As classes do Bootstrap controlam aparência, sobreposição e animação. O ID do modal é referenciado pelo botão que o abre. Dentro dele, o formulário agrupa campos relacionados. Cada `label` usa `for` para apontar ao `id` do campo correspondente. `required` exige preenchimento; `type="number"` define entrada numérica; `min` e `step` limitam os valores; `type="date"` oferece seletor de data; `select` apresenta opções. O JavaScript escuta o envio do formulário, lê os valores e registra os dados.

### Bloco 10 — carregamento dos scripts
Os scripts ficam no fim do `body` para que os elementos HTML já tenham sido interpretados quando o JavaScript executar. jQuery é carregado antes do Bootstrap 4 porque essa versão depende dele. Popper auxilia no posicionamento de componentes; Bootstrap JS habilita interações como modais; Chart.js desenha os gráficos; por último vem o script do projeto, que utiliza essas bibliotecas.

### Como acompanhar o código completo abaixo
Leia o HTML de cima para baixo e localize os blocos nesta mesma ordem. Sempre que encontrar um `id`, procure esse nome no arquivo JavaScript: normalmente é ali que o elemento é atualizado ou recebe um evento. Classes são usadas principalmente pelo CSS, enquanto tags descrevem a função semântica de cada parte da página.

## Código explicado por blocos e linha por linha

### Bloco 1 — trecho 1 a 8

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Minhas Finanças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
```

- **Linha 1:** Declara o padrão HTML5 para que o navegador interprete o documento corretamente.
- **Linha 2:** Abre o documento HTML. `lang="pt-br"` informa que o idioma principal é português brasileiro.
- **Linha 3:** Abre a área de configurações e recursos da página, que normalmente não aparecem no conteúdo visual.
- **Linha 4:** Define UTF-8, permitindo exibir corretamente acentos e caracteres especiais.
- **Linha 5:** Faz a largura da página acompanhar a largura do dispositivo, importante para o layout responsivo.
- **Linha 6:** Define o título que aparece na aba do navegador.
- **Linha 7:** Importa o CSS do Bootstrap 4.6.2, que oferece classes prontas para layout, botões, formulários e modais.
- **Linha 8:** Carrega a biblioteca Bootstrap Icons, usada para exibir ícones por meio de classes como `bi bi-wallet2`.

### Bloco 2 — trecho 9 a 16

```html
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-current-page="dashboard">
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="index.html">
                <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
                <span>Minhas<span class="brand-light">Finanças</span></span>
```

- **Linha 9:** Importa a folha de estilos própria do projeto. O caminho é relativo à localização deste HTML.
- **Linha 10:** Fecha a área de configurações do documento.
- **Linha 11:** Abre o conteúdo da página. `data-current-page` é um atributo personalizado que identifica qual tela está aberta.
- **Linha 12:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 13:** Abre a área lateral de navegação. A classe `sidebar` conecta este elemento às regras visuais do CSS; o ID permite encontrá-lo no JavaScript.
- **Linha 14:** Cria o link da marca. `href` define o destino e as classes permitem estilizar o logotipo.
- **Linha 15:** Cria um contêiner em linha para agrupar texto ou ícone sem iniciar uma nova linha.
- **Linha 16:** Cria um contêiner em linha para agrupar texto ou ícone sem iniciar uma nova linha.

### Bloco 3 — trecho 17 a 24

```html
            </a>
            <nav class="side-nav" aria-label="Menu principal">
                <a href="index.html" class="nav-link active" aria-current="page"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a href="paginas/gastos.html" class="nav-link" ><i class="bi bi-cart3"></i> Gastos</a>
                <a href="paginas/entradas.html" class="nav-link" ><i class="bi bi-arrow-down-circle"></i> Entradas</a>
                <a href="paginas/investimentos.html" class="nav-link" ><i class="bi bi-graph-up-arrow"></i> Investimentos</a>
                <a href="paginas/guardado.html" class="nav-link" ><i class="bi bi-piggy-bank"></i> Guardado</a>
            </nav>
```

- **Linha 17:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 18:** Agrupa os links de navegação. `aria-label` dá um nome acessível ao menu.
- **Linha 19:** Cria um link de navegação. `href` indica o arquivo de destino; `active` destaca a tela atual e `aria-current` comunica isso a leitores de tela.
- **Linha 20:** Cria um link de navegação. `href` indica o arquivo de destino; `active` destaca a tela atual e `aria-current` comunica isso a leitores de tela.
- **Linha 21:** Cria um link de navegação. `href` indica o arquivo de destino; `active` destaca a tela atual e `aria-current` comunica isso a leitores de tela.
- **Linha 22:** Cria um link de navegação. `href` indica o arquivo de destino; `active` destaca a tela atual e `aria-current` comunica isso a leitores de tela.
- **Linha 23:** Cria um link de navegação. `href` indica o arquivo de destino; `active` destaca a tela atual e `aria-current` comunica isso a leitores de tela.
- **Linha 24:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.

### Bloco 4 — trecho 25 a 32

```html
            <a href="#" class="nav-link side-logout" id="clearData"><i class="bi bi-box-arrow-left"></i> Limpar dados locais</a>
        </aside>
        <main class="main-area">
            <header class="topbar">
                <button class="mobile-menu" id="menuToggle" aria-label="Abrir menu"><i class="bi bi-list"></i></button>
                <div>
                    <p class="topbar-eyebrow">CONTROLE FINANCEIRO PESSOAL</p>
                    <h1 id="pageHeading">Dashboard</h1>
```

- **Linha 25:** Cria a ação de limpar os dados locais. O ID `clearData` permite ao JavaScript capturar o clique.
- **Linha 26:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 27:** Abre a área principal do conteúdo da página. A classe `main-area` recebe o layout definido no CSS.
- **Linha 28:** Abre a área de configurações e recursos da página, que normalmente não aparecem no conteúdo visual.
- **Linha 29:** Cria o botão do menu para telas pequenas. O ID `menuToggle` permite ao JavaScript ouvir o clique; `aria-label` descreve sua função.
- **Linha 30:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 31:** Cria um parágrafo para texto auxiliar ou informação da interface. A classe controla a aparência e o ID, quando existe, permite atualização pelo JavaScript.
- **Linha 32:** Define o título principal da página. O ID `pageHeading` permite que o JavaScript localize esse título.

### Bloco 5 — trecho 33 a 40

```html
                </div>
                <div class="topbar-date"><i class="bi bi-calendar3"></i> <span id="todayLabel"></span></div>
            </header>
            <section id="page-dashboard">
                <div class="summary-grid">
                    <article class="summary-card income-card"><div class="summary-top"><span>Saldo geral</span><i class="bi bi-wallet2"></i></div><strong id="balanceTotal">R$ 0,00</strong><small>Entradas menos gastos</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Entradas</span><i class="bi bi-arrow-down-circle text-green"></i></div><strong id="incomeTotal">R$ 0,00</strong><small>Total recebido</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Gastos</span><i class="bi bi-arrow-up-circle text-red"></i></div><strong id="expenseTotal">R$ 0,00</strong><small>Total utilizado</small></article>
```

- **Linha 33:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 34:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 35:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 36:** Agrupa uma seção temática do conteúdo principal.
- **Linha 37:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 38:** Representa um conteúdo independente, como um cartão de resumo ou painel.
- **Linha 39:** Representa um conteúdo independente, como um cartão de resumo ou painel.
- **Linha 40:** Representa um conteúdo independente, como um cartão de resumo ou painel.

### Bloco 6 — trecho 41 a 48

```html
                    <article class="summary-card"><div class="summary-top"><span>Investido</span><i class="bi bi-graph-up-arrow text-blue"></i></div><strong id="investedTotal">R$ 0,00</strong><small>Valor aplicado</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Guardado</span><i class="bi bi-piggy-bank text-purple"></i></div><strong id="savedTotal">R$ 0,00</strong><small>Nas suas metas</small></article>
                </div>

                <div class="dashboard-grid">
                    <article class="panel chart-panel">
                        <div class="panel-heading"><div><h2>Entradas e gastos</h2><p>Comparativo mensal</p></div><span class="panel-icon"><i class="bi bi-bar-chart"></i></span></div>
                        <div class="chart-wrap"><canvas id="monthlyChart" aria-label="Gráfico de entradas e gastos"></canvas></div>
```

- **Linha 41:** Representa um conteúdo independente, como um cartão de resumo ou painel.
- **Linha 42:** Representa um conteúdo independente, como um cartão de resumo ou painel.
- **Linha 43:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 45:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 46:** Representa um conteúdo independente, como um cartão de resumo ou painel.
- **Linha 47:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 48:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 7 — trecho 49 a 56

```html
                    </article>
                    <article class="panel chart-panel">
                        <div class="panel-heading"><div><h2>Gastos por categoria</h2><p>Distribuição das despesas</p></div><span class="panel-icon"><i class="bi bi-pie-chart"></i></span></div>
                        <div class="chart-wrap"><canvas id="categoryChart" aria-label="Gráfico de gastos por categoria"></canvas></div>
                    </article>
                </div>

                <article class="panel">
```

- **Linha 49:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 50:** Representa um conteúdo independente, como um cartão de resumo ou painel.
- **Linha 51:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 52:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 53:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 54:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 56:** Representa um conteúdo independente, como um cartão de resumo ou painel.

### Bloco 8 — trecho 57 a 64

```html
                    <div class="panel-heading"><div><h2>Transações recentes</h2><p>Últimos lançamentos registrados</p></div><button class="btn btn-sm btn-outline-light" data-page="gastos">Ver gastos</button></div>
                    <div class="transaction-list" id="recentTransactions"></div>
                </article>
            </section>
        </main>
    </div>
    <!-- Modal de despesa: Bootstrap abre e fecha esta janela. -->
    <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalTitle" aria-hidden="true">
```

- **Linha 57:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 58:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 59:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 60:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 61:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 62:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 63:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.
- **Linha 64:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 9 — trecho 65 a 72

```html
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="expenseModalTitle">Nova Despesa</h5><button type="button" class="close text-light" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div>
            <form id="expenseForm"><div class="modal-body">
                <div class="form-group"><label for="expenseName">Nome</label><input class="form-control" id="expenseName" required placeholder="Ex.: Conta de água"></div>
                <div class="form-row"><div class="form-group col-6"><label for="expenseValue">Valor (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="expenseValue" required></div><div class="form-group col-6"><label for="expenseDate">Data</label><input class="form-control" type="date" id="expenseDate" required></div></div>
                <div class="form-row"><div class="form-group col-6"><label for="expenseCategory">Categoria</label><select class="form-control" id="expenseCategory" required><option value="">Selecione</option><option>Alimentação</option><option>Transporte</option><option>Moradia</option><option>Saúde</option><option>Lazer</option><option>Outros</option></select></div><div class="form-group col-6"><label for="expensePayment">Pagamento</label><select class="form-control" id="expensePayment"><option>PIX</option><option>Cartão de Crédito</option><option>Cartão de Débito</option><option>Dinheiro</option><option>Transferência</option></select></div></div>
                <div class="form-group"><label for="expenseDescription">Descrição (opcional)</label><input class="form-control" id="expenseDescription" placeholder="Observações"></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="submit">Salvar</button></div></form>
```

- **Linha 65:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 66:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 67:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 68:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 69:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 70:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 71:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 72:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.

### Bloco 10 — trecho 73 a 80

```html
        </div></div>
    </div>

    <!-- Modal de entrada -->
    <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="incomeModalTitle">Nova Entrada</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="incomeForm"><div class="modal-body">
```

- **Linha 73:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 74:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 76:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.
- **Linha 77:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 78:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 79:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 80:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.

### Bloco 11 — trecho 81 a 88

```html
                <div class="form-group"><label for="incomeName">Descrição</label><input class="form-control" id="incomeName" required placeholder="Ex.: Salário mensal"></div>
                <div class="form-row"><div class="form-group col-6"><label for="incomeValue">Valor (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="incomeValue" required></div><div class="form-group col-6"><label for="incomeDate">Data</label><input class="form-control" type="date" id="incomeDate" required></div></div>
                <div class="form-group"><label for="incomePayment">Método de recebimento</label><select class="form-control" id="incomePayment"><option>PIX</option><option>Transferência</option><option>Dinheiro</option><option>Depósito</option></select></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-success" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de investimento -->
```

- **Linha 81:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 82:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 83:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 84:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 85:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 86:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 88:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.

### Bloco 12 — trecho 89 a 96

```html
    <div class="modal fade" id="investmentModal" tabindex="-1" role="dialog" aria-labelledby="investmentModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="investmentModalTitle">Novo Investimento</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="investmentForm"><div class="modal-body">
                <div class="form-group"><label for="investmentName">Nome</label><input class="form-control" id="investmentName" required placeholder="Ex.: Tesouro Selic"></div>
                <div class="form-group"><label for="investmentType">Tipo</label><select class="form-control" id="investmentType"><option>Ações</option><option>Renda fixa</option><option>Criptomoedas</option><option>Fundos</option><option>Outros</option></select></div>
                <div class="form-row"><div class="form-group col-6"><label for="investmentApplied">Valor investido (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="investmentApplied" required></div><div class="form-group col-6"><label for="investmentCurrent">Valor atual (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="investmentCurrent" required></div></div>
                <div class="form-group"><label for="investmentDate">Data</label><input class="form-control" type="date" id="investmentDate" required></div>
```

- **Linha 89:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 90:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 91:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 92:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 93:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 94:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 95:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 96:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 13 — trecho 97 a 104

```html
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de meta -->
    <div class="modal fade" id="goalModal" tabindex="-1" role="dialog" aria-labelledby="goalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="goalModalTitle">Nova Meta</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
```

- **Linha 97:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 98:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 99:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 101:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.
- **Linha 102:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 103:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 104:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 14 — trecho 105 a 112

```html
            <form id="goalForm"><div class="modal-body">
                <div class="form-group"><label for="goalName">Nome da meta</label><input class="form-control" id="goalName" required placeholder="Ex.: Viagem para Europa"></div>
                <div class="form-row"><div class="form-group col-6"><label for="goalTarget">Valor alvo (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="goalTarget" required></div><div class="form-group col-6"><label for="goalSaved">Guardado (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="goalSaved" value="0" required></div></div>
                <div class="form-group"><label for="goalDeadline">Data limite (opcional)</label><input class="form-control" type="date" id="goalDeadline"></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-purple" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

```

- **Linha 105:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 106:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 107:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 108:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 109:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 110:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 111:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.

### Bloco 15 — trecho 113 a 120

```html

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
```

- **Linha 114:** Carrega jQuery, dependência usada pelo Bootstrap 4 para controlar componentes como modais.
- **Linha 115:** Carrega Popper, utilizado pelo Bootstrap para posicionar alguns componentes.
- **Linha 116:** Carrega o JavaScript do Bootstrap, responsável pelas interações dos componentes.
- **Linha 117:** Carrega Chart.js, biblioteca que desenha os gráficos nos elementos canvas.
- **Linha 118:** Carrega o JavaScript próprio do sistema, que manipula os dados e os elementos da página.
- **Linha 119:** Fecha o corpo visível da página.
- **Linha 120:** Fecha o elemento raiz e encerra o documento HTML.


