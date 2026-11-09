# Página de Gastos — projeto/paginas/gastos.html

Esta página apresenta as despesas, o campo de pesquisa, o filtro por categoria, a lista de registros e o modal de cadastro de uma despesa.

## Como ler este arquivo

Estude os trechos apresentados em cada bloco. O código aparece dividido em partes menores, seguido da explicação das linhas correspondentes. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. Head: carrega as mesmas bibliotecas da página inicial. Como este HTML está dentro de paginas, os caminhos locais começam com ../.
2. Sidebar: repete a navegação para que o usuário possa trocar de página. Os links voltam um nível com ../.
3. Topbar e toolbar: identificam a tela e oferecem o botão Nova Despesa.
4. Pesquisa e filtro: expenseSearch e expenseCategoryFilter são lidos pelo JavaScript para filtrar a lista.
5. Lista: expenseList é o destino onde o JavaScript desenha os registros.
6. Modal: expenseModal contém expenseForm e os campos usados para montar um objeto de despesa.
7. Scripts: os caminhos relativos usam ../js/script.js.

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

## Código explicado por blocos e linha por linha

### Bloco 1 — trecho 1 a 8

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos - Minhas Finanças</title>
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body data-current-page="gastos">
    <div class="app-shell">
        <aside class="sidebar" id="sidebar">
            <a class="brand" href="../index.html">
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
                <a href="../index.html" class="nav-link" ><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a href="../paginas/gastos.html" class="nav-link active" aria-current="page"><i class="bi bi-cart3"></i> Gastos</a>
                <a href="../paginas/entradas.html" class="nav-link" ><i class="bi bi-arrow-down-circle"></i> Entradas</a>
                <a href="../paginas/investimentos.html" class="nav-link" ><i class="bi bi-graph-up-arrow"></i> Investimentos</a>
                <a href="../paginas/guardado.html" class="nav-link" ><i class="bi bi-piggy-bank"></i> Guardado</a>
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
                    <h1 id="pageHeading">Gastos</h1>
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
            <section id="page-gastos">
                <div class="section-toolbar"><div><h2>Gastos</h2><p id="expenseSubtitle">Total: R$ 0,00</p></div><button class="btn btn-danger" data-toggle="modal" data-target="#expenseModal"><i class="bi bi-plus-lg"></i> Nova Despesa</button></div>
                <div class="panel"><div class="filter-row"><input type="search" class="form-control" id="expenseSearch" placeholder="Buscar despesa..."><select class="form-control" id="expenseCategoryFilter"><option value="">Todas as categorias</option><option>Alimentação</option><option>Transporte</option><option>Moradia</option><option>Saúde</option><option>Lazer</option><option>Outros</option></select></div><div id="expenseList" class="record-list"></div></div>
            </section>
        </main>
```

- **Linha 33:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 34:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 35:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 36:** Agrupa uma seção temática do conteúdo principal.
- **Linha 37:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 38:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 39:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 40:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.

### Bloco 6 — trecho 41 a 48

```html
    </div>
    <!-- Modal de despesa: Bootstrap abre e fecha esta janela. -->
    <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="expenseModalTitle">Nova Despesa</h5><button type="button" class="close text-light" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div>
            <form id="expenseForm"><div class="modal-body">
                <div class="form-group"><label for="expenseName">Nome</label><input class="form-control" id="expenseName" required placeholder="Ex.: Conta de água"></div>
                <div class="form-row"><div class="form-group col-6"><label for="expenseValue">Valor (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="expenseValue" required></div><div class="form-group col-6"><label for="expenseDate">Data</label><input class="form-control" type="date" id="expenseDate" required></div></div>
```

- **Linha 41:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 42:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.
- **Linha 43:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 44:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 45:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 46:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 47:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 48:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 7 — trecho 49 a 56

```html
                <div class="form-row"><div class="form-group col-6"><label for="expenseCategory">Categoria</label><select class="form-control" id="expenseCategory" required><option value="">Selecione</option><option>Alimentação</option><option>Transporte</option><option>Moradia</option><option>Saúde</option><option>Lazer</option><option>Outros</option></select></div><div class="form-group col-6"><label for="expensePayment">Pagamento</label><select class="form-control" id="expensePayment"><option>PIX</option><option>Cartão de Crédito</option><option>Cartão de Débito</option><option>Dinheiro</option><option>Transferência</option></select></div></div>
                <div class="form-group"><label for="expenseDescription">Descrição (opcional)</label><input class="form-control" id="expenseDescription" placeholder="Observações"></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-danger" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de entrada -->
    <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalTitle" aria-hidden="true">
```

- **Linha 49:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 50:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 51:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 52:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 53:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 55:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.
- **Linha 56:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 8 — trecho 57 a 64

```html
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="incomeModalTitle">Nova Entrada</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="incomeForm"><div class="modal-body">
                <div class="form-group"><label for="incomeName">Descrição</label><input class="form-control" id="incomeName" required placeholder="Ex.: Salário mensal"></div>
                <div class="form-row"><div class="form-group col-6"><label for="incomeValue">Valor (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="incomeValue" required></div><div class="form-group col-6"><label for="incomeDate">Data</label><input class="form-control" type="date" id="incomeDate" required></div></div>
                <div class="form-group"><label for="incomePayment">Método de recebimento</label><select class="form-control" id="incomePayment"><option>PIX</option><option>Transferência</option><option>Dinheiro</option><option>Depósito</option></select></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-success" type="submit">Salvar</button></div></form>
        </div></div>
```

- **Linha 57:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 58:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 59:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 60:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 61:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 62:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 63:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 64:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.

### Bloco 9 — trecho 65 a 72

```html
    </div>

    <!-- Modal de investimento -->
    <div class="modal fade" id="investmentModal" tabindex="-1" role="dialog" aria-labelledby="investmentModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="investmentModalTitle">Novo Investimento</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="investmentForm"><div class="modal-body">
                <div class="form-group"><label for="investmentName">Nome</label><input class="form-control" id="investmentName" required placeholder="Ex.: Tesouro Selic"></div>
```

- **Linha 65:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 67:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.
- **Linha 68:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 69:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 70:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 71:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 72:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.

### Bloco 10 — trecho 73 a 80

```html
                <div class="form-group"><label for="investmentType">Tipo</label><select class="form-control" id="investmentType"><option>Ações</option><option>Renda fixa</option><option>Criptomoedas</option><option>Fundos</option><option>Outros</option></select></div>
                <div class="form-row"><div class="form-group col-6"><label for="investmentApplied">Valor investido (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="investmentApplied" required></div><div class="form-group col-6"><label for="investmentCurrent">Valor atual (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="investmentCurrent" required></div></div>
                <div class="form-group"><label for="investmentDate">Data</label><input class="form-control" type="date" id="investmentDate" required></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="submit">Salvar</button></div></form>
        </div></div>
    </div>

    <!-- Modal de meta -->
```

- **Linha 73:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 74:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 75:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 76:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 77:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 78:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 80:** Comentário HTML: serve para documentar o código; o navegador não o mostra como conteúdo da página.

### Bloco 11 — trecho 81 a 88

```html
    <div class="modal fade" id="goalModal" tabindex="-1" role="dialog" aria-labelledby="goalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content app-modal">
            <div class="modal-header"><h5 class="modal-title" id="goalModalTitle">Nova Meta</h5><button type="button" class="close text-light" data-dismiss="modal">&times;</button></div>
            <form id="goalForm"><div class="modal-body">
                <div class="form-group"><label for="goalName">Nome da meta</label><input class="form-control" id="goalName" required placeholder="Ex.: Viagem para Europa"></div>
                <div class="form-row"><div class="form-group col-6"><label for="goalTarget">Valor alvo (R$)</label><input class="form-control" type="number" min="0.01" step="0.01" id="goalTarget" required></div><div class="form-group col-6"><label for="goalSaved">Guardado (R$)</label><input class="form-control" type="number" min="0" step="0.01" id="goalSaved" value="0" required></div></div>
                <div class="form-group"><label for="goalDeadline">Data limite (opcional)</label><input class="form-control" type="date" id="goalDeadline"></div>
            </div><div class="modal-footer"><button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button><button class="btn btn-purple" type="submit">Salvar</button></div></form>
```

- **Linha 81:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 82:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 83:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 84:** Agrupa campos que serão enviados juntos. O ID permite ao JavaScript capturar o evento `submit`.
- **Linha 85:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 86:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 87:** Cria um contêiner genérico para agrupar elementos. A classe indica ao CSS como organizar e estilizar o grupo; IDs são pontos de acesso do JavaScript.
- **Linha 88:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.

### Bloco 12 — trecho 89 a 96

```html
        </div></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
```

- **Linha 89:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 90:** Fecha o elemento HTML aberto anteriormente e delimita o fim desse bloco.
- **Linha 93:** Carrega jQuery, dependência usada pelo Bootstrap 4 para controlar componentes como modais.
- **Linha 94:** Carrega Popper, utilizado pelo Bootstrap para posicionar alguns componentes.
- **Linha 95:** Carrega o JavaScript do Bootstrap, responsável pelas interações dos componentes.
- **Linha 96:** Carrega Chart.js, biblioteca que desenha os gráficos nos elementos canvas.

### Bloco 13 — trecho 97 a 99

```html
    <script src="../js/script.js"></script>
</body>
</html>
```

- **Linha 97:** Carrega o JavaScript próprio do sistema, que manipula os dados e os elementos da página.
- **Linha 98:** Fecha o corpo visível da página.
- **Linha 99:** Fecha o elemento raiz e encerra o documento HTML.


