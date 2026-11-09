# Dashboard — projeto/index.html

Esta é a página inicial do sistema. Ela apresenta o resumo financeiro, os cartões com totais, os elementos canvas dos gráficos e a área das transações recentes.

## Como ler este arquivo

Primeiro leia o código completo sem alterar nada. Depois acompanhe o roteiro abaixo, localizando cada parte no código. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. DOCTYPE e elemento html: definem o documento HTML5 e o idioma.
2. Head: contém charset, viewport, título, bibliotecas externas e CSS próprio.
3. Sidebar: contém a marca e os links para cada arquivo HTML. O link da página atual recebe a classe active.
4. Topbar: contém o botão de menu para celular, o título e o espaço em que o JavaScript escreve a data.
5. Resumo financeiro: os elementos com IDs como balanceTotal, incomeTotal e expenseTotal são preenchidos pelo JavaScript.
6. Gráficos: os elementos canvas monthlyChart e categoryChart são utilizados pelo Chart.js.
7. Transações recentes: o contêiner recentTransactions é preenchido dinamicamente.
8. Scripts: jQuery, Popper, Bootstrap, Chart.js e o JavaScript do projeto são carregados no final, na ordem necessária.

## Código-fonte integral

O bloco abaixo reproduz o conteúdo completo do arquivo que está no repositório no momento da documentação. O código foi preservado integralmente para você poder acompanhar linha por linha e copiar o arquivo, se necessário.

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Minhas Finanças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-current-page="dashboard">
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="index.html">
                <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
                <span>Minhas<span class="brand-light">Finanças</span></span>
            </a>
            <nav class="side-nav" aria-label="Menu principal">
                <a href="index.html" class="nav-link active" aria-current="page"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a href="paginas/gastos.html" class="nav-link" ><i class="bi bi-cart3"></i> Gastos</a>
                <a href="paginas/entradas.html" class="nav-link" ><i class="bi bi-arrow-down-circle"></i> Entradas</a>
                <a href="paginas/investimentos.html" class="nav-link" ><i class="bi bi-graph-up-arrow"></i> Investimentos</a>
                <a href="paginas/guardado.html" class="nav-link" ><i class="bi bi-piggy-bank"></i> Guardado</a>
            </nav>
            <a href="#" class="nav-link side-logout" id="clearData"><i class="bi bi-box-arrow-left"></i> Limpar dados locais</a>
        </aside>
        <main class="main-area">
            <header class="topbar">
                <button class="mobile-menu" id="menuToggle" aria-label="Abrir menu"><i class="bi bi-list"></i></button>
                <div>
                    <p class="topbar-eyebrow">CONTROLE FINANCEIRO PESSOAL</p>
                    <h1 id="pageHeading">Dashboard</h1>
                </div>
                <div class="topbar-date"><i class="bi bi-calendar3"></i> <span id="todayLabel"></span></div>
            </header>
            <section id="page-dashboard">
                <div class="summary-grid">
                    <article class="summary-card income-card"><div class="summary-top"><span>Saldo geral</span><i class="bi bi-wallet2"></i></div><strong id="balanceTotal">R$ 0,00</strong><small>Entradas menos gastos</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Entradas</span><i class="bi bi-arrow-down-circle text-green"></i></div><strong id="incomeTotal">R$ 0,00</strong><small>Total recebido</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Gastos</span><i class="bi bi-arrow-up-circle text-red"></i></div><strong id="expenseTotal">R$ 0,00</strong><small>Total utilizado</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Investido</span><i class="bi bi-graph-up-arrow text-blue"></i></div><strong id="investedTotal">R$ 0,00</strong><small>Valor aplicado</small></article>
                    <article class="summary-card"><div class="summary-top"><span>Guardado</span><i class="bi bi-piggy-bank text-purple"></i></div><strong id="savedTotal">R$ 0,00</strong><small>Nas suas metas</small></article>
                </div>

                <div class="dashboard-grid">
                    <article class="panel chart-panel">
                        <div class="panel-heading"><div><h2>Entradas e gastos</h2><p>Comparativo mensal</p></div><span class="panel-icon"><i class="bi bi-bar-chart"></i></span></div>
                        <div class="chart-wrap"><canvas id="monthlyChart" aria-label="Gráfico de entradas e gastos"></canvas></div>
                    </article>
                    <article class="panel chart-panel">
                        <div class="panel-heading"><div><h2>Gastos por categoria</h2><p>Distribuição das despesas</p></div><span class="panel-icon"><i class="bi bi-pie-chart"></i></span></div>
                        <div class="chart-wrap"><canvas id="categoryChart" aria-label="Gráfico de gastos por categoria"></canvas></div>
                    </article>
                </div>

                <article class="panel">
                    <div class="panel-heading"><div><h2>Transações recentes</h2><p>Últimos lançamentos registrados</p></div><button class="btn btn-sm btn-outline-light" data-page="gastos">Ver gastos</button></div>
                    <div class="transaction-list" id="recentTransactions"></div>
                </article>
            </section>
        </main>
    </div>
    <!-- Modal de despesa: Bootstrap abre e fecha esta janela. -->
    <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="expenseModalTitle">Nova Despesa</h5><button type="button" class="close text-light" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div>
            <form id="expenseForm"><div class="modal-body">
                <div class="form-group"><label for="expenseName">Nome</label><input class="form-control" id="expenseName" required placeholder="Ex.: Conta de água"></div>
                <div class="form-row"><div class="form-group col-6"><label for="expenseValue">Valor (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="expenseValue" required></div><div class="form-group col-6"><label for="expenseDate">Data</label><input class="form-control" type="date" id="expenseDate" required></div></div>
                <div class="form-row"><div class="form-group col-6"><label for="expenseCategory">Categoria</label><select class="form-control" id="expenseCategory" required><option value="">Selecione</option><option>Alimentação</option><option>Transporte</option><option>Moradia</option><option>Saúde</option><option>Lazer</option><option>Outros</option></select></div><div class="form-group col-6"><label for="expensePayment">Pagamento</label><select class="form-control" id="expensePayment"><option>PIX</option><option>Cartão de Crédito</option><option>Cartão de Débito</option><option>Dinheiro</option><option>Transferência</option></select></div></div>
                <div class="form-group"><label for="expenseDescription">Descrição (opcional)</label><input class="form-control" id="expenseDescription" placeholder="Observações"></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de entrada -->
    <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="incomeModalTitle">Nova Entrada</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="incomeForm"><div class="modal-body">
                <div class="form-group"><label for="incomeName">Descrição</label><input class="form-control" id="incomeName" required placeholder="Ex.: Salário mensal"></div>
                <div class="form-row"><div class="form-group col-6"><label for="incomeValue">Valor (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="incomeValue" required></div><div class="form-group col-6"><label for="incomeDate">Data</label><input class="form-control" type="date" id="incomeDate" required></div></div>
                <div class="form-group"><label for="incomePayment">Método de recebimento</label><select class="form-control" id="incomePayment"><option>PIX</option><option>Transferência</option><option>Dinheiro</option><option>Depósito</option></select></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-success" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de investimento -->
    <div class="modal fade" id="investmentModal" tabindex="-1" role="dialog" aria-labelledby="investmentModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="investmentModalTitle">Novo Investimento</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="investmentForm"><div class="modal-body">
                <div class="form-group"><label for="investmentName">Nome</label><input class="form-control" id="investmentName" required placeholder="Ex.: Tesouro Selic"></div>
                <div class="form-group"><label for="investmentType">Tipo</label><select class="form-control" id="investmentType"><option>Ações</option><option>Renda fixa</option><option>Criptomoedas</option><option>Fundos</option><option>Outros</option></select></div>
                <div class="form-row"><div class="form-group col-6"><label for="investmentApplied">Valor investido (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="investmentApplied" required></div><div class="form-group col-6"><label for="investmentCurrent">Valor atual (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="investmentCurrent" required></div></div>
                <div class="form-group"><label for="investmentDate">Data</label><input class="form-control" type="date" id="investmentDate" required></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de meta -->
    <div class="modal fade" id="goalModal" tabindex="-1" role="dialog" aria-labelledby="goalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="goalModalTitle">Nova Meta</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="goalForm"><div class="modal-body">
                <div class="form-group"><label for="goalName">Nome da meta</label><input class="form-control" id="goalName" required placeholder="Ex.: Viagem para Europa"></div>
                <div class="form-row"><div class="form-group col-6"><label for="goalTarget">Valor alvo (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="goalTarget" required></div><div class="form-group col-6"><label for="goalSaved">Guardado (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="goalSaved" value="0" required></div></div>
                <div class="form-group"><label for="goalDeadline">Data limite (opcional)</label><input class="form-control" type="date" id="goalDeadline"></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-purple" type="submit">Salvar</button></div></form>
        </div></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
```

## Prática

1. Abra o arquivo original no Visual Studio Code.
2. Abra este documento ao lado dele.
3. Leia o código em blocos, seguindo a explicação acima.
4. Para cada tag, classe, ID, propriedade ou função que encontrar, tente explicar em voz alta para que serve.
5. Faça uma pequena alteração de teste, veja o resultado no navegador e depois decida se deseja mantê-la.

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

