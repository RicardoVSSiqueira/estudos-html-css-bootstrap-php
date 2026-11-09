# Página de Gastos — projeto/paginas/gastos.html

Esta página apresenta as despesas, o campo de pesquisa, o filtro por categoria, a lista de registros e o modal de cadastro de uma despesa.

## Como ler este arquivo

Primeiro leia o código completo sem alterar nada. Depois acompanhe o roteiro abaixo, localizando cada parte no código. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. Head: carrega as mesmas bibliotecas da página inicial. Como este HTML está dentro de paginas, os caminhos locais começam com ../.
2. Sidebar: repete a navegação para que o usuário possa trocar de página. Os links voltam um nível com ../.
3. Topbar e toolbar: identificam a tela e oferecem o botão Nova Despesa.
4. Pesquisa e filtro: expenseSearch e expenseCategoryFilter são lidos pelo JavaScript para filtrar a lista.
5. Lista: expenseList é o destino onde o JavaScript desenha os registros.
6. Modal: expenseModal contém expenseForm e os campos usados para montar um objeto de despesa.
7. Scripts: os caminhos relativos usam ../js/script.js.

## Código-fonte integral

O bloco abaixo reproduz o conteúdo completo do arquivo que está no repositório no momento da documentação. O código foi preservado integralmente para você poder acompanhar linha por linha e copiar o arquivo, se necessário.

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos - Minhas Finanças</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body data-current-page="gastos">
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="../index.html">
                <span class="brand-mark"><i class="bi bi-wallet2"></i></span>
                <span>Minhas<span class="brand-light">Finanças</span></span>
            </a>
            <nav class="side-nav" aria-label="Menu principal">
                <a href="../index.html" class="nav-link" ><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a href="../paginas/gastos.html" class="nav-link active" aria-current="page"><i class="bi bi-cart3"></i> Gastos</a>
                <a href="../paginas/entradas.html" class="nav-link" ><i class="bi bi-arrow-down-circle"></i> Entradas</a>
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
                    <h1 id="pageHeading">Gastos</h1>
                </div>
                <div class="topbar-date"><i class="bi bi-calendar3"></i> <span id="todayLabel"></span></div>
            </header>
            <section id="page-gastos">
                <div class="section-toolbar"><div><h2>Gastos</h2><p id="expenseSubtitle">Total: R$ 0,00</p></div><button class="btn btn-danger" data-toggle="modal" data-target="#expenseModal"><i class="bi bi-plus-lg"></i> Nova Despesa</button></div>
                <div class="panel"><div class="filter-row"><input type="search" class="form-control" id="expenseSearch" placeholder="Buscar despesa..."><select class="form-control" id="expenseCategoryFilter"><option value="">Todas as categorias</option><option>Alimentação</option><option>Transporte</option><option>Moradia</option><option>Saúde</option><option>Lazer</option><option>Outros</option></select></div><div id="expenseList" class="record-list"></div></div>
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
`DOCTYPE` ativa o padrão HTML5. `lang="pt-br"` define o idioma. UTF-8 permite acentos e caracteres especiais. A configuração viewport faz o navegador adaptar a página à largura do dispositivo. O título identifica a tela Gastos na aba.

### Bloco 2 — bibliotecas e caminho do CSS
Bootstrap fornece classes prontas de layout, botões, campos e modais. Bootstrap Icons fornece os ícones. O CSS próprio é carregado por `../css/style.css`. O trecho `../` significa voltar uma pasta: como este arquivo está em `projeto/paginas`, primeiro voltamos para `projeto` e depois entramos em `css`.

### Bloco 3 — menu lateral
O `aside` contém a navegação que se repete nas páginas. Os links usam caminhos relativos: `../index.html` volta ao Dashboard e os demais links apontam para arquivos que estão na mesma pasta `paginas`. A classe `active` indica visualmente que Gastos é a tela atual. `aria-current="page"` oferece essa informação a leitores de tela. IDs como `sidebar` e `menuToggle` permitem ao JavaScript localizar o menu e o botão que o abre no celular.

### Bloco 4 — cabeçalho superior
A área `main` envolve o conteúdo principal. O cabeçalho apresenta o botão mobile, a identificação do sistema, o título Gastos e o espaço da data. O JavaScript preenche o elemento da data. O botão não muda de página: ele apenas abre ou fecha o menu lateral em telas menores.

### Bloco 5 — título da seção e botão Nova Despesa
A barra de ferramentas agrupa o nome da seção, um texto auxiliar e o botão de cadastro. O texto auxiliar é atualizado com a quantidade ou soma de despesas, conforme a lógica do script. Os atributos `data-toggle="modal"` e `data-target="#expenseModal"` são lidos pelo Bootstrap: ao clicar, ele abre o modal cujo ID corresponde ao valor de `data-target`.

### Bloco 6 — pesquisa e filtro por categoria
O input `expenseSearch` recebe o texto digitado. O select `expenseCategoryFilter` permite escolher uma categoria. Esses campos não filtram sozinhos: o JavaScript adiciona ouvintes aos eventos de digitação e alteração, lê seus valores e seleciona quais registros devem aparecer.

### Bloco 7 — área de resultados
`expenseList` é o contêiner no qual o JavaScript monta as despesas. Ele pode estar vazio no HTML porque os registros são inseridos dinamicamente. Cada linha exibida é construída a partir dos dados salvos no navegador.

### Bloco 8 — modal e formulário de despesa
O modal tem o ID `expenseModal`; o formulário tem o ID `expenseForm`. Os campos coletam descrição, valor, data, categoria, forma de pagamento e observações. O atributo `for` do label deve corresponder exatamente ao ID do campo. `required` torna o preenchimento obrigatório; `min` define o menor número aceito; `step` define os intervalos permitidos, como centavos; `type="date"` cria o seletor de data. Ao salvar, o script impede o envio tradicional e trata os dados no próprio navegador.

### Bloco 9 — scripts no final da página
jQuery, Popper e Bootstrap JS são carregados para que os modais funcionem. Chart.js é compartilhado com o Dashboard. O caminho `../js/script.js` sobe de `paginas` para `projeto` e entra na pasta `js`. O script comum verifica quais elementos existem antes de utilizá-los, permitindo que o mesmo arquivo seja carregado nas cinco páginas.

### Relação entre os arquivos
O HTML define os campos e contêineres; o CSS define a aparência; o JavaScript lê os campos, salva e exibe os registros. Se um ID for alterado apenas no HTML, a função JavaScript que procura o ID antigo deixará de encontrar o elemento.

