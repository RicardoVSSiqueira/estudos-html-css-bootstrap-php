# Página de Entradas — projeto/paginas/entradas.html

Esta tela permite consultar e cadastrar valores recebidos. O HTML fornece os campos e contêineres; o JavaScript trata o envio e atualiza os dados.

## Como ler este arquivo

Primeiro leia o código completo sem alterar nada. Depois acompanhe o roteiro abaixo, localizando cada parte no código. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. Head: configura idioma, codificação, viewport, título e dependências CSS.
2. Sidebar: navegação compartilhada com links relativos à pasta paginas.
3. Topbar e toolbar: mostram o nome da tela e o botão de nova entrada.
4. Pesquisa: incomeSearch é utilizado para filtrar entradas.
5. Lista: incomeList recebe os registros renderizados pelo JavaScript.
6. Modal e formulário: incomeModal e incomeForm agrupam os campos de uma nova entrada.
7. Scripts: jQuery e dependências Bootstrap vêm antes de script.js.

## Código-fonte integral

O bloco abaixo reproduz o conteúdo completo do arquivo que está no repositório no momento da documentação. O código foi preservado integralmente para você poder acompanhar linha por linha e copiar o arquivo, se necessário.

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas - Minhas Finanças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body data-current-page="entradas">
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="../index.html">
                <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
                <span>Minhas<span class="brand-light">Finanças</span></span>
            </a>
            <nav class="side-nav" aria-label="Menu principal">
                <a href="../index.html" class="nav-link" ><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a href="../paginas/gastos.html" class="nav-link" ><i class="bi bi-cart3"></i> Gastos</a>
                <a href="../paginas/entradas.html" class="nav-link active" aria-current="page"><i class="bi bi-arrow-down-circle"></i> Entradas</a>
                <a href="../paginas/investimentos.html" class="nav-link" ><i class="bi bi-graph-up-arrow"></i> Investimentos</a>
                <a href="../paginas/guardado.html" class="nav-link" ><i class="bi bi-piggy-bank"></i> Guardado</a>
            </nav>
            <a href="#" class="nav-link side-logout" id="clearData"><i class="bi bi-box-arrow-left"></i> Limpar dados locais</a>
        </aside>
        <main class="main-area">
            <header class="topbar">
                <button class="mobile-menu" id="menuToggle" aria-label="Abrir menu"><i class="bi bi-list"></i></button>
                <div>
                    <p class="topbar-eyebrow">CONTROLE FINANCEIRO PESSOAL</p>
                    <h1 id="pageHeading">Entradas</h1>
                </div>
                <div class="topbar-date"><i class="bi bi-calendar3"></i> <span id="todayLabel"></span></div>
            </header>
            <section id="page-entradas">
                <div class="section-toolbar"><div><h2>Entradas</h2><p id="incomeSubtitle">Total: R$ 0,00</p></div><button class="btn btn-success" data-toggle="modal" data-target="#incomeModal"><i class="bi bi-plus-lg"></i> Nova Entrada</button></div>
                <div class="panel"><div class="filter-row"><input type="search" class="form-control" id="incomeSearch" placeholder="Buscar entrada..."></div><div id="incomeList" class="record-list"></div></div>
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
    <script src="../js/script.js"></script>
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

### Bloco 1 — estrutura inicial
`<!DOCTYPE html>` declara HTML5. O idioma em `lang` orienta navegadores e leitores de tela. UTF-8 habilita acentos. Viewport permite o ajuste para telas pequenas. O título identifica a página Entradas na aba do navegador.

### Bloco 2 — dependências visuais
Bootstrap fornece componentes e classes de layout. Bootstrap Icons disponibiliza os ícones. O arquivo `../css/style.css` contém as personalizações do projeto. O caminho começa com `../` porque o HTML está dentro da pasta `paginas`.

### Bloco 3 — navegação lateral
A sidebar mantém os mesmos links das demais telas, para que o usuário possa navegar pelo sistema. O link Entradas recebe `active`, que é uma classe visual, e `aria-current="page"`, que indica a página atual semanticamente. Os caminhos com `../` retornam à pasta principal do projeto antes de acessar o Dashboard.

### Bloco 4 — cabeçalho e identificação da tela
O cabeçalho reúne o botão de menu, a identificação do sistema, o título e a data. O botão é usado no layout mobile. O elemento da data é preenchido pelo JavaScript com a data do dia.

### Bloco 5 — barra de ações e total
A barra organiza o título da seção e o botão Nova Entrada. O texto de resumo recebe seu valor dinamicamente. O botão aponta para `#incomeModal`; o Bootstrap usa esse seletor para localizar e abrir a janela de cadastro.

### Bloco 6 — campo de pesquisa
`incomeSearch` permite pesquisar pelo nome ou descrição da entrada. O campo fornece o texto digitado, mas a filtragem é realizada pelo JavaScript. O evento `input` é disparado durante a digitação, permitindo atualizar a lista imediatamente.

### Bloco 7 — lista de entradas
`incomeList` é o espaço em que os registros são inseridos. A função de renderização percorre os dados, cria as linhas e coloca o resultado dentro desse contêiner. Se não houver entradas, o script pode exibir uma mensagem de lista vazia.

### Bloco 8 — janela e formulário
`incomeModal` identifica a janela; `incomeForm` identifica o formulário. Os campos guardam descrição, valor, data e forma de recebimento. Labels associados por `for` melhoram acessibilidade e permitem clicar no rótulo para focar o campo. `required` exige os dados essenciais; `type="number"`, `min` e `step` restringem o valor; `type="date"` oferece seleção de data. O JavaScript lê os valores pelo ID de cada campo quando o formulário é enviado.

### Bloco 9 — carregamento das bibliotecas
A ordem é importante: jQuery vem antes do Bootstrap 4; Popper dá suporte a componentes posicionados; Bootstrap JS implementa o modal; Chart.js é utilizado no Dashboard; e `../js/script.js` executa a lógica do sistema depois que o HTML e as bibliotecas estão disponíveis.

### Ligação com o JavaScript
O formulário não grava diretamente no banco de dados. Nesta etapa front-end, o script cria um objeto JavaScript com os valores informados, adiciona esse objeto ao array de entradas, salva os dados no `localStorage` do navegador e redesenha a lista.

