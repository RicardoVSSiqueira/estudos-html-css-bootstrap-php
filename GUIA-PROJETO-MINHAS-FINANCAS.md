# Projeto Minhas Finanças — guia de construção completo

Este guia acompanha o código real que está na pasta `projeto/`. A interface foi planejada a partir das oito imagens de referência enviadas: Dashboard, Gastos, Entradas, Investimentos, Dinheiro Guardado e os quatro formulários de cadastro.

> **Ordem combinada:** primeiro concluir o front-end. Não instalar/configurar XAMPP nem escrever PHP/MySQL nesta fase. Os dados de demonstração ficam no navegador usando localStorage; isso será substituído por PHP e MySQL na fase de back-end.

## 1. O que vamos construir

- Sidebar escura com Dashboard, Gastos, Entradas, Investimentos e Guardado.
- Dashboard com saldo, entradas, gastos, investimentos e valor guardado.
- Gráfico de comparação mensal e gráfico de gastos por categoria.
- Listas de despesas e entradas.
- Cartões de investimentos e metas com progresso.
- Modais para cadastrar despesa, entrada, investimento e meta.
- Layout adaptado para computador, tablet e celular.

## 2. Estrutura de pastas

```text
projeto/
├── index.html          # Estrutura das telas e formulários
├── css/
│   └── style.css       # Cores, tamanhos, layout e responsividade
└── js/
    └── script.js       # Navegação, cadastros, filtros, gráficos e armazenamento local
```

## 3. Preparar o ambiente

1. Instale/abra o Visual Studio Code e o Google Chrome.
2. No GitHub, abra o repositório e entre em `projeto/`.
3. Baixe o repositório pelo botão **Code > Download ZIP** ou clone-o com Git.
4. Abra a pasta do projeto no VS Code.
5. Abra `projeto/index.html` no navegador. Se usar Live Server, clique com o botão direito no arquivo e escolha **Open with Live Server**.
6. Nesta fase não é necessário XAMPP: são arquivos HTML, CSS e JavaScript.

## 4. Etapa HTML — entender a estrutura

Abra `projeto/index.html`. O documento começa com:

- `<!DOCTYPE html>`: informa ao navegador que usamos HTML5.
- `<html lang="pt-br">`: define o idioma da página.
- `<head>`: configurações, título e arquivos externos.
- `<meta charset="UTF-8">`: permite acentos e caracteres especiais.
- `<meta name="viewport"...>`: faz a página respeitar a largura do celular.
- `<title>`: nome mostrado na aba do navegador.

### 4.1 Bootstrap e CSS

No `<head>`, carregamos primeiro Bootstrap 4.6.2, depois Bootstrap Icons e por último nosso `css/style.css`. A ordem importa: nosso CSS vem depois para substituir os estilos padrão quando necessário.

Bootstrap fornece classes prontas como `btn`, `form-control`, `modal`, `modal-dialog`, `form-row` e `col-6`. O arquivo próprio define a identidade escura da aplicação.

### 4.2 Sidebar

O elemento `<aside class="sidebar">` representa o menu lateral. Cada link possui `data-page`, um atributo que o JavaScript usa para descobrir qual tela mostrar. O `<nav>` agrupa os links de navegação.

### 4.3 Área principal

O `<main>` contém o cabeçalho e as seções. Cada seção tem uma classe `page-section` e um identificador, como `page-dashboard` ou `page-gastos`. Inicialmente apenas o Dashboard está visível.

### 4.4 Cartões e gráficos

Os cartões de resumo usam `article`, pois cada cartão é um bloco independente de informação. Os elementos `canvas` são espaços onde a biblioteca Chart.js desenha os gráficos.

### 4.5 Listas e formulários

As áreas `expenseList`, `incomeList`, `investmentList` e `goalList` começam vazias no HTML. O JavaScript preenche esses espaços com os dados. Os formulários usam os atributos `required`, `type="number"` e `type="date"` para validações básicas do navegador.

Os modais usam os atributos do Bootstrap 4, como `data-toggle="modal"` e `data-target="#expenseModal"`. Assim, o botão abre a janela correspondente sem precisar escrever essa abertura manualmente.

## 5. Etapa CSS — reproduzir o visual

Abra `projeto/css/style.css`.

- As variáveis em `:root` centralizam as cores principais.
- `.sidebar` fixa o menu à esquerda.
- `.main-area` cria o espaço de conteúdo ao lado do menu.
- `.summary-grid` usa CSS Grid para distribuir os cinco cartões.
- `.dashboard-grid` divide os dois gráficos em colunas.
- `.panel`, `.summary-card` e `.goal-card` criam superfícies escuras com bordas discretas.
- Os seletores `@media` mudam a disposição em telas menores; no celular a sidebar desliza para fora da tela e pode ser aberta pelo botão de menu.

Experimente alterar as cores em `:root` e observe como os componentes mudam juntos.

## 6. Etapa Bootstrap 4.6

O projeto usa Bootstrap 4.6.2, conforme a organização das aulas:

- **Grid e formulários:** `form-row`, `col-6` e `form-control`.
- **Botões:** `btn`, `btn-danger`, `btn-success` e `btn-primary`.
- **Modais:** `modal`, `modal-dialog`, `modal-content`, `modal-header`, `modal-body` e `modal-footer`.
- **Responsividade:** classes de grid e regras próprias em CSS.

Não misture exemplos do Bootstrap 5 com este projeto: os atributos `data-toggle` e `data-dismiss` são da versão 4.

## 7. Etapa JavaScript — comportamento do front-end

Abra `projeto/js/script.js`.

1. `initialData` fornece exemplos iniciais para visualizar a interface.
2. `loadData()` recupera os dados guardados no navegador.
3. `saveData()` grava os dados no localStorage.
4. `showPage()` troca a seção visível e atualiza o item ativo da sidebar.
5. `renderSummary()` calcula os totais e atualiza os cartões.
6. `renderExpenses()` e `renderIncomes()` desenham as listas e aplicam a busca.
7. `renderInvestments()` e `renderGoals()` montam os cartões e barras de progresso.
8. `renderCharts()` usa Chart.js para criar os gráficos.
9. `connectForm()` escuta o envio dos formulários, adiciona o registro e atualiza a tela.
10. `removeRecord()` exclui um item após confirmação.

### Importante sobre os dados

O localStorage é apenas uma solução temporária para a demonstração do front-end. Os registros ficam no navegador utilizado e não são compartilhados entre usuários ou computadores. Não é um banco de dados seguro. Na fase seguinte, vamos criar a API em PHP e persistir os dados no MySQL.

## 8. Roteiro de testes

- [ ] Abrir o Dashboard e conferir os cinco cartões.
- [ ] Navegar entre as cinco opções da sidebar.
- [ ] Cadastrar uma despesa e conferir a lista e os totais.
- [ ] Buscar uma despesa pelo nome e filtrar por categoria.
- [ ] Cadastrar e excluir uma entrada.
- [ ] Cadastrar um investimento e conferir o resultado.
- [ ] Criar uma meta e conferir o percentual de progresso.
- [ ] Atualizar o navegador e conferir que os dados continuam salvos.
- [ ] Reduzir a largura do navegador e testar o menu mobile.
- [ ] Testar no Chrome e corrigir qualquer diferença visual.

## 9. Próxima fase — somente depois do front-end

Quando todas as telas e interações estiverem aprovadas, começaremos a segunda fase: instalar/configurar XAMPP, criar o banco MySQL, desenvolver PHP e substituir o localStorage por operações reais de cadastro, consulta, edição e exclusão.

## 10. Como estudar

Não copie tudo sem testar. Faça uma etapa por vez, leia os comentários no código, altere pequenos detalhes e tente explicar o que cada parte faz. O objetivo é aprender a construir e conseguir apresentar o projeto.
