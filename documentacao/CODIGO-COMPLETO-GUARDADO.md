# Página Dinheiro Guardado — projeto/paginas/guardado.html

Esta tela apresenta objetivos financeiros e o progresso de cada meta. O JavaScript calcula o percentual concluído e monta os cartões.

## Como ler este arquivo

Primeiro leia o código completo sem alterar nada. Depois acompanhe o roteiro abaixo, localizando cada parte no código. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. Head: configura o documento e importa os estilos e bibliotecas.
2. Sidebar: repete a navegação compartilhada.
3. Topbar e toolbar: identificam a tela e disponibilizam a ação de cadastrar uma meta.
4. Resumo: goalSubtitle recebe o total guardado.
5. Lista: goalList recebe os cartões de metas.
6. Modal: goalModal contém goalForm e os campos para nome, valor desejado, valor guardado e prazo.
7. Scripts: carregam as dependências e script.js.

## Código-fonte integral

O bloco abaixo reproduz o conteúdo completo do arquivo que está no repositório no momento da documentação. O código foi preservado integralmente para você poder acompanhar linha por linha e copiar o arquivo, se necessário.

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinheiro Guardado - Minhas Finanças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body data-current-page="guardado">
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="../index.html">
                <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
                <span>Minhas<span class="brand-light">Finanças</span></span>
            </a>
            <nav class="side-nav" aria-label="Menu principal">
                <a href="../index.html" class="nav-link" ><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a href="../paginas/gastos.html" class="nav-link" ><i class="bi bi-cart3"></i> Gastos</a>
                <a href="../paginas/entradas.html" class="nav-link" ><i class="bi bi-arrow-down-circle"></i> Entradas</a>
                <a href="../paginas/investimentos.html" class="nav-link" ><i class="bi bi-graph-up-arrow"></i> Investimentos</a>
                <a href="../paginas/guardado.html" class="nav-link active" aria-current="page"><i class="bi bi-piggy-bank"></i> Guardado</a>
            </nav>
            <a href="#" class="nav-link side-logout" id="clearData"><i class="bi bi-box-arrow-left"></i> Limpar dados locais</a>
        </aside>
        <main class="main-area">
            <header class="topbar">
                <button class="mobile-menu" id="menuToggle" aria-label="Abrir menu"><i class="bi bi-list"></i></button>
                <div>
                    <p class="topbar-eyebrow">CONTROLE FINANCEIRO PESSOAL</p>
                    <h1 id="pageHeading">Dinheiro Guardado</h1>
                </div>
                <div class="topbar-date"><i class="bi bi-calendar3"></i> <span id="todayLabel"></span></div>
            </header>
            <section id="page-guardado">
                <div class="section-toolbar"><div><h2>Dinheiro Guardado</h2><p id="goalSubtitle">Total guardado: R$ 0,00</p></div><button class="btn btn-purple" data-toggle="modal" data-target="#goalModal"><i class="bi bi-plus-lg"></i> Nova Meta</button></div>
                <div class="goal-grid" id="goalList"></div>
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

### Bloco 1 — configurações do documento
DOCTYPE ativa HTML5. `lang="pt-br"` declara o idioma. UTF-8 permite acentos. Viewport adapta o conteúdo ao celular. O title identifica a página Dinheiro Guardado.

### Bloco 2 — bibliotecas e CSS
Bootstrap disponibiliza classes de layout, botões e formulários. Bootstrap Icons fornece os ícones. `../css/style.css` carrega os estilos próprios. O prefixo `../` volta uma pasta, pois este documento está em `projeto/paginas`.

### Bloco 3 — menu lateral
O menu contém links para todas as telas. O link Guardado recebe a classe `active` para destaque e `aria-current="page"` para informar a página atual. Os IDs do menu e do botão mobile são utilizados pelo JavaScript.

### Bloco 4 — cabeçalho e barra de ações
O cabeçalho identifica a página e contém o botão que abre a navegação em telas pequenas. O elemento de data recebe a data atual por JavaScript. A barra de ações apresenta o botão de nova meta, que aponta para o modal `goalModal`.

### Bloco 5 — total guardado
O elemento `goalSubtitle` é o espaço reservado para mostrar o total já guardado nas metas. O JavaScript soma os valores guardados e atualiza esse texto.

### Bloco 6 — cartões de metas
`goalList` é o contêiner onde os cartões serão criados. Para cada meta, o script compara o valor guardado com o valor desejado. O percentual é calculado dividindo o valor guardado pelo alvo e multiplicando por 100. A barra visual recebe essa porcentagem como largura, limitada a 100% para não ultrapassar o cartão.

### Bloco 7 — modal e formulário de meta
`goalModal` identifica a janela e `goalForm` identifica o formulário. Os campos recebem nome da meta, valor desejado, valor já guardado e prazo. Labels associados aos inputs facilitam o uso. `required` exige campos essenciais; `type="number"` define entrada numérica; `min` impede valores abaixo do mínimo; `step` define os intervalos; `type="date"` permite selecionar prazo.

### Bloco 8 — dependências e fluxo de dados
As bibliotecas Bootstrap são carregadas antes do script próprio. Ao enviar o formulário, o JavaScript lê os campos, cria um objeto de meta, adiciona-o ao array correspondente, salva os dados no localStorage e atualiza a lista. Isso é armazenamento local do navegador, não persistência em servidor.

### Exemplo de progresso
Uma meta de R$ 2.000 com R$ 500 guardados está 25% concluída: 500 dividido por 2.000, multiplicado por 100. O cartão mostra os valores e uma barra preenchida em um quarto do espaço.

