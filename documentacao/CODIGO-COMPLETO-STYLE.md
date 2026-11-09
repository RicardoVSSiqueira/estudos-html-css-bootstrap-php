# Folha de estilos completa — projeto/css/style.css

Este arquivo concentra a identidade visual e a responsividade de todas as páginas. As regras são aplicadas aos elementos pelas tags, classes e IDs definidos no HTML.

## Como ler este arquivo

Primeiro leia o código completo sem alterar nada. Depois acompanhe o roteiro abaixo, localizando cada parte no código. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. Variáveis em :root: centralizam as cores para facilitar alterações em todo o projeto.
2. Reset e estilos globais: definem box-sizing, margens, fontes, cores e comportamento padrão.
3. Layout principal: .app-shell, .sidebar e .main-area organizam o menu fixo e a área de conteúdo.
4. Marca e navegação: estilizam logotipo, ícones, links e estado ativo.
5. Topbar: organiza título, botão mobile e data.
6. Dashboard: .summary-grid e .dashboard-grid organizam cartões e gráficos com CSS Grid.
7. Painéis e listas: definem fundos, bordas, espaçamentos, linhas e estados positivo/negativo.
8. Formulários e botões: personalizam campos, foco, botões e modais do Bootstrap.
9. Investimentos e metas: organizam cartões e barras de progresso.
10. Media queries: adaptam o layout a telas menores, escondendo o menu até ser aberto e reorganizando colunas.

## Código-fonte integral

O bloco abaixo reproduz o conteúdo completo do arquivo que está no repositório no momento da documentação. O código foi preservado integralmente para você poder acompanhar linha por linha e copiar o arquivo, se necessário.

```css
/* =========================================================
   MINHAS FINANÇAS — CSS
   O Bootstrap cuida da estrutura básica dos componentes.
   Este arquivo personaliza o visual escuro das referências.
   ========================================================= */
:root {
    --background: #050914;
    --sidebar: #080e1b;
    --panel: #0c1423;
    --panel-soft: #111c2d;
    --border: #1c2a3d;
    --text: #f4f7fb;
    --muted: #8290a5;
    --green: #08b981;
    --red: #f04452;
    --blue: #3478f6;
    --purple: #a13cf0;
}
* { box-sizing: border-box; }
body { margin: 0; background: var(--background); color: var(--text); font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
a { color: inherit; }
.app-shell { min-height: 100vh; }
.sidebar { width: 238px; position: fixed; top: 0; bottom: 0; left: 0; z-index: 1000; padding: 22px 14px; background: var(--sidebar); border-right: 1px solid var(--border); display: flex; flex-direction: column; }
.brand { display: flex; align-items: center; gap: 9px; padding: 0 8px 28px; font-size: 16px; font-weight: 700; text-decoration: none !important; }
.brand-mark { color: #ffd43b; font-size: 20px; }
.brand-light { color: #ffd43b; }
.side-nav { display: flex; flex-direction: column; gap: 7px; }
.nav-link { color: #aab5c5; border-radius: 8px; padding: 11px 12px; display: flex; align-items: center; gap: 12px; font-size: 13px; transition: .2s; }
.nav-link i { width: 17px; font-size: 15px; }
.nav-link:hover, .nav-link.active { color: #fff; background: #102a30; text-decoration: none; }
.nav-link.active { border: 1px solid #17604f; }
.side-logout { margin-top: auto; }
.main-area { margin-left: 238px; padding: 28px 30px 40px; max-width: 1800px; }
.topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px; gap: 15px; }
.topbar-eyebrow { color: var(--muted); font-size: 9px; letter-spacing: 1.4px; margin: 0 0 5px; }
.topbar h1 { font-size: 23px; font-weight: 700; margin: 0; }
.topbar-date { color: var(--muted); font-size: 12px; }
.mobile-menu { display: none; background: var(--panel); border: 1px solid var(--border); color: white; border-radius: 7px; padding: 5px 10px; font-size: 22px; }
.summary-grid { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 13px; margin-bottom: 17px; }
.summary-card, .panel, .investment-card, .goal-card { background: var(--panel); border: 1px solid var(--border); border-radius: 9px; }
.summary-card { padding: 15px 16px; min-width: 0; }
.summary-top { display: flex; justify-content: space-between; color: #aeb9c9; font-size: 11px; margin-bottom: 12px; }
.summary-top i { font-size: 16px; }
.summary-card strong { display: block; font-size: 19px; white-space: nowrap; }
.summary-card small { display: block; color: var(--muted); margin-top: 7px; font-size: 10px; }
.text-green { color: var(--green); } .text-red { color: var(--red); } .text-blue { color: var(--blue); } .text-purple { color: var(--purple); }
.dashboard-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 16px; }
.panel { padding: 17px; margin-bottom: 16px; }
.panel-heading { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 14px; }
.panel-heading h2, .section-toolbar h2 { font-size: 15px; font-weight: 700; margin: 0 0 5px; }
.panel-heading p, .section-toolbar p { color: var(--muted); font-size: 10px; margin: 0; }
.panel-icon { color: #718096; font-size: 17px; }
.chart-wrap { height: 190px; position: relative; }
.transaction-list, .record-list { display: flex; flex-direction: column; }
.transaction-row, .record-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 12px 3px; border-bottom: 1px solid var(--border); }
.transaction-row:last-child, .record-row:last-child { border-bottom: 0; }
.record-main { min-width: 0; }
.record-title { color: #f2f5fa; font-size: 12px; font-weight: 600; margin: 0 0 5px; }
.record-meta { color: var(--muted); font-size: 10px; margin: 0; }
.record-value { white-space: nowrap; font-size: 12px; font-weight: 700; }
.negative { color: var(--red); } .positive { color: var(--green); }
.section-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 3px 0 18px; }
.section-toolbar h2 { font-size: 20px; }
.section-toolbar p { font-size: 11px; }
.btn { border-radius: 6px; font-size: 11px; font-weight: 600; padding: 9px 13px; }
.btn-danger { background: #dc3545; border-color: #dc3545; } .btn-success { background: #079d70; border-color: #079d70; }
.btn-primary { background: #2865e8; border-color: #2865e8; }
.btn-purple { background: #922ee5; color: #fff; border: 1px solid #922ee5; }
.btn-purple:hover { color: #fff; background: #7e24ca; }
.filter-row { display: flex; gap: 10px; margin-bottom: 12px; }
.form-control { background: #1a2638; border: 1px solid #2b3a4e; color: #f4f7fb; font-size: 11px; height: 37px; border-radius: 5px; }
.form-control:focus { background: #1a2638; color: white; border-color: #3979ee; box-shadow: 0 0 0 .15rem rgba(57,121,238,.15); }
.form-control::placeholder { color: #8290a5; }
select.form-control option { background: #1a2638; }
.investment-grid, .goal-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
.investment-card, .goal-card { padding: 16px; }
.card-topline { display: flex; justify-content: space-between; align-items: center; color: var(--muted); font-size: 10px; }
.investment-card h3, .goal-card h3 { font-size: 13px; font-weight: 700; margin: 12px 0 5px; }
.card-amount { font-size: 17px; font-weight: 700; }
.card-sub { font-size: 10px; color: var(--muted); margin-top: 6px; }
.progress { height: 6px; background: #202c3d; border-radius: 10px; margin-top: 13px; }
.progress-bar { background: var(--purple); }
.goal-percent { color: var(--purple); font-size: 10px; text-align: right; margin-top: 5px; }
.empty-state { color: var(--muted); text-align: center; padding: 28px 10px; font-size: 12px; }
.row-actions { display: flex; gap: 5px; }
.row-actions button { background: transparent; border: 0; color: #91a0b4; padding: 3px 5px; }
.app-modal { background: #111b2b; border: 1px solid #2a374a; border-radius: 9px; color: var(--text); }
.app-modal .modal-header, .app-modal .modal-footer { border-color: #2a374a; }
.app-modal .modal-title { font-size: 16px; font-weight: 700; }
.app-modal label { color: #aeb9c9; font-size: 10px; margin-bottom: 6px; }
.app-modal .form-group { margin-bottom: 13px; }
.app-modal .close { opacity: .8; text-shadow: none; }
.btn-outline-secondary { color: #c0cad8; border-color: #3a485c; }
.btn-outline-light { color: #c0cad8; border-color: #3a485c; }
.page-section { display: none; }
.page-section.active { display: block; }
@media (max-width: 1100px) {
    .summary-grid { grid-template-columns: repeat(3, 1fr); }
    .investment-grid, .goal-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
    .sidebar { transform: translateX(-100%); transition: transform .25s ease; box-shadow: 15px 0 35px rgba(0,0,0,.35); }
    .sidebar.open { transform: translateX(0); }
    .main-area { margin-left: 0; padding: 18px 14px 30px; }
    .mobile-menu { display: inline-block; }
    .topbar { justify-content: flex-start; }
    .topbar-date { margin-left: auto; font-size: 10px; }
    .topbar h1 { font-size: 20px; }
    .summary-grid { grid-template-columns: repeat(2, 1fr); gap: 9px; }
    .summary-card { padding: 12px; }
    .summary-card strong { font-size: 16px; }
    .dashboard-grid { grid-template-columns: 1fr; gap: 0; }
    .investment-grid, .goal-grid { grid-template-columns: 1fr; }
    .filter-row { flex-direction: column; }
    .section-toolbar { align-items: flex-start; }
}

```

## Prática

1. Abra o arquivo original no Visual Studio Code.
2. Abra este documento ao lado dele.
3. Leia o código em blocos, seguindo a explicação acima.
4. Para cada tag, classe, ID, propriedade ou função que encontrar, tente explicar em voz alta para que serve.
5. Faça uma pequena alteração de teste, veja o resultado no navegador e depois decida se deseja mantê-la.

## Explicação detalhada das regras CSS por bloco

### Bloco 1 — variáveis em `:root`
`:root` seleciona o elemento raiz do documento. Declarações como `--bg`, `--panel` e `--text` são propriedades personalizadas (variáveis CSS). Elas guardam cores reutilizadas em vários seletores. `var(--bg)` lê o valor da variável. A vantagem é alterar uma cor em um único lugar e atualizar todos os componentes que a utilizam.

### Bloco 2 — reset e estilos globais
O seletor universal `*` aplica a regra a todos os elementos. `box-sizing: border-box` faz com que padding e borda sejam incluídos no cálculo de largura e altura, deixando o dimensionamento mais previsível. Regras de `body` definem fonte, cor, fundo e margens gerais. A remoção da margem padrão evita espaços inesperados ao redor da página.

### Bloco 3 — estrutura principal
`.app-shell` organiza o layout completo. `.sidebar` define largura, fundo e posicionamento da navegação lateral. `.main-area` ocupa o espaço restante. Propriedades como `display`, `width`, `min-height`, `margin` e `padding` controlam como as áreas ficam lado a lado e quanto espaço existe ao redor do conteúdo.

### Bloco 4 — marca e navegação
`.brand` organiza o ícone e o nome do sistema. `.brand-mark` estiliza a área visual do ícone. `.side-nav` organiza os links. `.nav-link` define alinhamento, espaçamento, cor e aparência. O seletor composto `.nav-link.active` só seleciona links que possuem as duas classes ao mesmo tempo, aplicando destaque ao item atual. Estados como hover mudam a aparência quando o ponteiro passa sobre um link.

### Bloco 5 — cabeçalho e Flexbox
`.topbar` utiliza `display: flex`. Flexbox facilita alinhar itens em uma linha. `align-items` alinha os elementos no eixo transversal; `justify-content` distribui o espaço no eixo principal; `gap` cria distância entre os itens. Regras descendentes estilizam título, textos auxiliares, data e botão do menu mobile.

### Bloco 6 — grades do Dashboard
`.summary-grid` e `.dashboard-grid` usam CSS Grid. `grid-template-columns` determina quantas colunas existem e como dividir o espaço. `repeat()` evita repetir manualmente a mesma definição. `minmax()` define limites mínimos e máximos flexíveis. `gap` controla a distância entre cartões e painéis.

### Bloco 7 — cartões e painéis
Seletores como `.summary-card` e `.panel` definem fundo, borda, raio dos cantos e espaçamento interno. `border-radius` arredonda cantos; `box-shadow` cria sombra; `padding` cria espaço entre a borda e o conteúdo. Seletores descendentes, como `.summary-card strong`, atingem elementos que estão dentro do cartão.

### Bloco 8 — listas e transações
As classes de lista organizam registros inseridos pelo JavaScript. Flexbox alinha descrição, data, valor e ações. Seletores de estado como `.positive` e `.negative` diferenciam visualmente valores positivos e negativos. Pseudo-classes como `:last-child` selecionam um item por sua posição, por exemplo o último registro, permitindo remover sua borda inferior.

### Bloco 9 — botões, filtros e campos
As classes próprias complementam as classes Bootstrap. `.form-control` estiliza campos e seletores. `:focus` representa o estado em que o campo está selecionado; `::placeholder` estiliza o texto de orientação. Classes de botão modificam cor, tamanho, borda e cursor sem alterar o comportamento HTML do botão.

### Bloco 10 — investimentos e metas
As grades dos cartões distribuem os itens em colunas responsivas. As classes de resultado positivo ou negativo destacam rendimento. A barra de progresso possui uma parte externa (trilho) e uma parte interna (preenchimento). O JavaScript calcula a porcentagem e altera a largura do preenchimento; o CSS define altura, cor e formato.

### Bloco 11 — modais
As regras que começam com `.app-modal` personalizam somente elementos que estão dentro de um modal com essa classe. Esse tipo de seletor evita afetar outros cabeçalhos ou botões fora da janela. O Bootstrap continua responsável por abrir, fechar e posicionar o modal.

### Bloco 12 — responsividade com media queries
Uma media query aplica regras somente quando a condição de tela é atendida. Em telas menores, a sidebar pode sair da área visível com transformação horizontal e reaparecer quando recebe a classe `open`. O conteúdo principal passa a ocupar a largura disponível; grades reduzem o número de colunas; filtros e botões podem ser empilhados. Assim, o mesmo HTML se adapta a computador, tablet e celular.

### Como interpretar uma declaração
Em `.summary-card strong { font-size: 19px; }`, `.summary-card strong` é o seletor; `font-size` é a propriedade; `19px` é o valor; e as chaves delimitam as declarações aplicadas. O ponto antes de `summary-card` indica uma classe. Dois pontos em `:hover` indicam uma pseudo-classe; dois pontos em `::placeholder` indicam um pseudo-elemento.

## Código explicado por blocos e linha por linha

### Bloco 1 — linhas 1 a 7

```css
/* =========================================================
   MINHAS FINANÇAS — CSS
   O Bootstrap cuida da estrutura básica dos componentes.
   Este arquivo personaliza o visual escuro das referências.
   ========================================================= */
:root {
    --background: #050914;
```

- **Linha 1:** Comentário CSS: documenta o propósito das regras e não altera o visual.
- **Linha 2:** Continua a regra CSS anterior; observe a propriedade e o valor separados por dois-pontos.
- **Linha 3:** Continua a regra CSS anterior; observe a propriedade e o valor separados por dois-pontos.
- **Linha 4:** Continua a regra CSS anterior; observe a propriedade e o valor separados por dois-pontos.
- **Linha 5:** Continua a regra CSS anterior; observe a propriedade e o valor separados por dois-pontos.
- **Linha 6:** Seleciona o elemento raiz do documento; normalmente é usado para declarar variáveis CSS globais.
- **Linha 7:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.

### Bloco 2 — linhas 8 a 14

```css
    --sidebar: #080e1b;
    --panel: #0c1423;
    --panel-soft: #111c2d;
    --border: #1c2a3d;
    --text: #f4f7fb;
    --muted: #8290a5;
    --green: #08b981;
```

- **Linha 8:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 9:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 10:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 11:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 12:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 13:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 14:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.

### Bloco 3 — linhas 15 a 21

```css
    --red: #f04452;
    --blue: #3478f6;
    --purple: #a13cf0;
}
* { box-sizing: border-box; }
body { margin: 0; background: var(--background); color: var(--text); font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
a { color: inherit; }
```

- **Linha 15:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 16:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 17:** Declara uma variável CSS personalizada. Ela pode ser reutilizada com `var(nome-da-variavel)`.
- **Linha 18:** Fecha o bloco de declarações do seletor ou da media query.
- **Linha 19:** Comentário CSS: documenta o propósito das regras e não altera o visual.
- **Linha 20:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 21:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 4 — linhas 22 a 28

```css
.app-shell { min-height: 100vh; }
.sidebar { width: 238px; position: fixed; top: 0; bottom: 0; left: 0; z-index: 1000; padding: 22px 14px; background: var(--sidebar); border-right: 1px solid var(--border); display: flex; flex-direction: column; }
.brand { display: flex; align-items: center; gap: 9px; padding: 0 8px 28px; font-size: 16px; font-weight: 700; text-decoration: none !important; }
.brand-mark { color: #ffd43b; font-size: 20px; }
.brand-light { color: #ffd43b; }
.side-nav { display: flex; flex-direction: column; gap: 7px; }
.nav-link { color: #aab5c5; border-radius: 8px; padding: 11px 12px; display: flex; align-items: center; gap: 12px; font-size: 13px; transition: .2s; }
```

- **Linha 22:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 23:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 24:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 25:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 26:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 27:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 28:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 5 — linhas 29 a 35

```css
.nav-link i { width: 17px; font-size: 15px; }
.nav-link:hover, .nav-link.active { color: #fff; background: #102a30; text-decoration: none; }
.nav-link.active { border: 1px solid #17604f; }
.side-logout { margin-top: auto; }
.main-area { margin-left: 238px; padding: 28px 30px 40px; max-width: 1800px; }
.topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px; gap: 15px; }
.topbar-eyebrow { color: var(--muted); font-size: 9px; letter-spacing: 1.4px; margin: 0 0 5px; }
```

- **Linha 29:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 30:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 31:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 32:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 33:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 34:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 35:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 6 — linhas 36 a 42

```css
.topbar h1 { font-size: 23px; font-weight: 700; margin: 0; }
.topbar-date { color: var(--muted); font-size: 12px; }
.mobile-menu { display: none; background: var(--panel); border: 1px solid var(--border); color: white; border-radius: 7px; padding: 5px 10px; font-size: 22px; }
.summary-grid { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 13px; margin-bottom: 17px; }
.summary-card, .panel, .investment-card, .goal-card { background: var(--panel); border: 1px solid var(--border); border-radius: 9px; }
.summary-card { padding: 15px 16px; min-width: 0; }
.summary-top { display: flex; justify-content: space-between; color: #aeb9c9; font-size: 11px; margin-bottom: 12px; }
```

- **Linha 36:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 37:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 38:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 39:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 40:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 41:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 42:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 7 — linhas 43 a 49

```css
.summary-top i { font-size: 16px; }
.summary-card strong { display: block; font-size: 19px; white-space: nowrap; }
.summary-card small { display: block; color: var(--muted); margin-top: 7px; font-size: 10px; }
.text-green { color: var(--green); } .text-red { color: var(--red); } .text-blue { color: var(--blue); } .text-purple { color: var(--purple); }
.dashboard-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 16px; }
.panel { padding: 17px; margin-bottom: 16px; }
.panel-heading { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 14px; }
```

- **Linha 43:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 44:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 45:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 46:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 47:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 48:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 49:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 8 — linhas 50 a 56

```css
.panel-heading h2, .section-toolbar h2 { font-size: 15px; font-weight: 700; margin: 0 0 5px; }
.panel-heading p, .section-toolbar p { color: var(--muted); font-size: 10px; margin: 0; }
.panel-icon { color: #718096; font-size: 17px; }
.chart-wrap { height: 190px; position: relative; }
.transaction-list, .record-list { display: flex; flex-direction: column; }
.transaction-row, .record-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 12px 3px; border-bottom: 1px solid var(--border); }
.transaction-row:last-child, .record-row:last-child { border-bottom: 0; }
```

- **Linha 50:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 51:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 52:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 53:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 54:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 55:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 56:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 9 — linhas 57 a 63

```css
.record-main { min-width: 0; }
.record-title { color: #f2f5fa; font-size: 12px; font-weight: 600; margin: 0 0 5px; }
.record-meta { color: var(--muted); font-size: 10px; margin: 0; }
.record-value { white-space: nowrap; font-size: 12px; font-weight: 700; }
.negative { color: var(--red); } .positive { color: var(--green); }
.section-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 3px 0 18px; }
.section-toolbar h2 { font-size: 20px; }
```

- **Linha 57:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 58:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 59:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 60:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 61:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 62:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 63:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 10 — linhas 64 a 70

```css
.section-toolbar p { font-size: 11px; }
.btn { border-radius: 6px; font-size: 11px; font-weight: 600; padding: 9px 13px; }
.btn-danger { background: #dc3545; border-color: #dc3545; } .btn-success { background: #079d70; border-color: #079d70; }
.btn-primary { background: #2865e8; border-color: #2865e8; }
.btn-purple { background: #922ee5; color: #fff; border: 1px solid #922ee5; }
.btn-purple:hover { color: #fff; background: #7e24ca; }
.filter-row { display: flex; gap: 10px; margin-bottom: 12px; }
```

- **Linha 64:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 65:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 66:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 67:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 68:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 69:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 70:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 11 — linhas 71 a 77

```css
.form-control { background: #1a2638; border: 1px solid #2b3a4e; color: #f4f7fb; font-size: 11px; height: 37px; border-radius: 5px; }
.form-control:focus { background: #1a2638; color: white; border-color: #3979ee; box-shadow: 0 0 0 .15rem rgba(57,121,238,.15); }
.form-control::placeholder { color: #8290a5; }
select.form-control option { background: #1a2638; }
.investment-grid, .goal-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
.investment-card, .goal-card { padding: 16px; }
.card-topline { display: flex; justify-content: space-between; align-items: center; color: var(--muted); font-size: 10px; }
```

- **Linha 71:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 72:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 73:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 74:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 75:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 76:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 77:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 12 — linhas 78 a 84

```css
.investment-card h3, .goal-card h3 { font-size: 13px; font-weight: 700; margin: 12px 0 5px; }
.card-amount { font-size: 17px; font-weight: 700; }
.card-sub { font-size: 10px; color: var(--muted); margin-top: 6px; }
.progress { height: 6px; background: #202c3d; border-radius: 10px; margin-top: 13px; }
.progress-bar { background: var(--purple); }
.goal-percent { color: var(--purple); font-size: 10px; text-align: right; margin-top: 5px; }
.empty-state { color: var(--muted); text-align: center; padding: 28px 10px; font-size: 12px; }
```

- **Linha 78:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 79:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 80:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 81:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 82:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 83:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 84:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 13 — linhas 85 a 91

```css
.row-actions { display: flex; gap: 5px; }
.row-actions button { background: transparent; border: 0; color: #91a0b4; padding: 3px 5px; }
.app-modal { background: #111b2b; border: 1px solid #2a374a; border-radius: 9px; color: var(--text); }
.app-modal .modal-header, .app-modal .modal-footer { border-color: #2a374a; }
.app-modal .modal-title { font-size: 16px; font-weight: 700; }
.app-modal label { color: #aeb9c9; font-size: 10px; margin-bottom: 6px; }
.app-modal .form-group { margin-bottom: 13px; }
```

- **Linha 85:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 86:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 87:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 88:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 89:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 90:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 91:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 14 — linhas 92 a 98

```css
.app-modal .close { opacity: .8; text-shadow: none; }
.btn-outline-secondary { color: #c0cad8; border-color: #3a485c; }
.btn-outline-light { color: #c0cad8; border-color: #3a485c; }
.page-section { display: none; }
.page-section.active { display: block; }
@media (max-width: 1100px) {
    .summary-grid { grid-template-columns: repeat(3, 1fr); }
```

- **Linha 92:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 93:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 94:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 95:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 96:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 97:** Inicia uma media query: as regras dentro dela só se aplicam quando a condição de largura da tela for verdadeira.
- **Linha 98:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 15 — linhas 99 a 105

```css
    .investment-grid, .goal-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
    .sidebar { transform: translateX(-100%); transition: transform .25s ease; box-shadow: 15px 0 35px rgba(0,0,0,.35); }
    .sidebar.open { transform: translateX(0); }
    .main-area { margin-left: 0; padding: 18px 14px 30px; }
    .mobile-menu { display: inline-block; }
```

- **Linha 99:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 100:** Fecha o bloco de declarações do seletor ou da media query.
- **Linha 101:** Inicia uma media query: as regras dentro dela só se aplicam quando a condição de largura da tela for verdadeira.
- **Linha 102:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 103:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 104:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 105:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 16 — linhas 106 a 112

```css
    .topbar { justify-content: flex-start; }
    .topbar-date { margin-left: auto; font-size: 10px; }
    .topbar h1 { font-size: 20px; }
    .summary-grid { grid-template-columns: repeat(2, 1fr); gap: 9px; }
    .summary-card { padding: 12px; }
    .summary-card strong { font-size: 16px; }
    .dashboard-grid { grid-template-columns: 1fr; gap: 0; }
```

- **Linha 106:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 107:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 108:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 109:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 110:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 111:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 112:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.

### Bloco 17 — linhas 113 a 117

```css
    .investment-grid, .goal-grid { grid-template-columns: 1fr; }
    .filter-row { flex-direction: column; }
    .section-toolbar { align-items: flex-start; }
}

```

- **Linha 113:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 114:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 115:** Seletor CSS: identifica quais elementos HTML receberão as propriedades que aparecem entre as chaves.
- **Linha 116:** Fecha o bloco de declarações do seletor ou da media query.


