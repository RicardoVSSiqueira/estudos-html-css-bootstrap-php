# CSS — explicação passo a passo do projeto Minhas Finanças

O arquivo `projeto/css/style.css` concentra o visual das cinco páginas. Todas as páginas usam esse mesmo arquivo, por isso uma alteração nele pode aparecer em várias telas.

## 1. Como uma regra CSS funciona?

Exemplo:

```css
body {
    margin: 0;
    background: var(--background);
    color: var(--text);
    font-family: Arial, Helvetica, sans-serif;
}
```

- `body` é o seletor: escolhe todos os elementos `<body>`.
- As chaves agrupam as declarações.
- `margin: 0` remove a margem padrão do navegador.
- `background` define o fundo.
- `color` define a cor do texto.
- `font-family` define a família tipográfica. O navegador tenta Arial; se não estiver disponível, tenta Helvetica e depois uma fonte sem serifa genérica.
- Cada declaração termina com ponto e vírgula.

## 2. Variáveis de cores com :root

No início do arquivo:

```css
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
```

- `:root` seleciona o elemento raiz do documento.
- Variáveis CSS começam com dois hífens, como `--background`.
- Os valores são cores em hexadecimal.
- Para usar uma variável, escrevemos `var(--background)`.
- A vantagem é mudar a cor em um único lugar e atualizar todos os componentes que usam aquela variável.

## 3. Ajustes gerais

```css
* { box-sizing: border-box; }
body { margin: 0; ... }
a { color: inherit; }
```

- `*` é o seletor universal: seleciona todos os elementos.
- `box-sizing: border-box` faz largura e altura incluírem o preenchimento e a borda, facilitando calcular dimensões.
- `a` seleciona todos os links.
- `color: inherit` faz o link herdar a cor do elemento pai.

## 4. Estrutura principal e menu lateral

```css
.sidebar {
    width: 238px;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 1000;
    padding: 22px 14px;
    display: flex;
    flex-direction: column;
}
.main-area {
    margin-left: 238px;
    padding: 28px 30px 40px;
}
```

- `width: 238px`: define a largura do menu.
- `position: fixed`: mantém o menu fixo na tela durante a rolagem.
- `top`, `bottom` e `left`: posicionam o menu nos limites da janela.
- `z-index`: controla a sobreposição; um valor alto mantém o menu acima de outros elementos.
- `padding`: cria espaço interno.
- `display: flex`: ativa o Flexbox.
- `flex-direction: column`: organiza os filhos verticalmente.
- `margin-left: 238px`: desloca o conteúdo principal para não ficar atrás do menu.

## 5. Menu e estados visuais

```css
.side-nav {
    display: flex;
    flex-direction: column;
    gap: 7px;
}
.nav-link:hover, .nav-link.active {
    color: #fff;
    background: #102a30;
}
```

- `gap` define o espaço entre os links.
- `:hover` aplica o estilo quando o ponteiro está sobre o link.
- `.active` é uma classe que o HTML usa para identificar a página selecionada.
- A vírgula permite aplicar a mesma regra a mais de um seletor.

## 6. Cabeçalho e alinhamento

```css
.topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
    gap: 15px;
}
```

- `display: flex`: coloca os elementos em uma linha.
- `align-items: center`: alinha os itens pelo centro vertical.
- `justify-content: space-between`: distribui o espaço entre os itens.
- `margin-bottom`: cria distância abaixo do cabeçalho.
- `gap`: cria espaço entre os itens.

## 7. Grid dos cartões e gráficos

```css
.summary-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 13px;
}
.dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}
```

- `display: grid`: ativa o CSS Grid.
- `grid-template-columns`: define as colunas.
- `repeat(5, ...)`: repete a configuração cinco vezes.
- `minmax(0, 1fr)`: permite que cada coluna divida o espaço sem ultrapassar o tamanho disponível.
- `1fr`: representa uma fração do espaço livre.
- `gap`: espaço entre cartões.

## 8. Cartões, painéis e textos

O arquivo aplica fundos, bordas e arredondamento a componentes como:

```css
.summary-card, .panel, .investment-card, .goal-card {
    background: var(--panel);
    border: 1px solid var(--border);
    border-radius: 9px;
}
```

O mesmo estilo é compartilhado por quatro classes. Isso evita repetir as mesmas propriedades.

- `background`: cor de fundo.
- `border`: espessura, tipo e cor da borda.
- `border-radius`: arredonda os cantos.

Outras propriedades importantes usadas no arquivo:

- `font-size`: tamanho do texto.
- `font-weight`: peso da fonte.
- `white-space: nowrap`: impede a quebra de linha.
- `min-width: 0`: permite que um item flex/grid encolha corretamente.
- `text-align`: alinhamento do texto.
- `transition`: suaviza uma mudança de estilo.
- `transform: translateX(...)`: desloca um elemento no eixo horizontal.

## 9. Listas e valores positivos/negativos

```css
.transaction-row, .record-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 3px;
    border-bottom: 1px solid var(--border);
}
.negative { color: var(--red); }
.positive { color: var(--green); }
```

Cada registro usa Flexbox para separar descrição e valor. A classe `.negative` destaca gastos em vermelho, enquanto `.positive` destaca entradas em verde.

## 10. Formulários e botões

O CSS personaliza as classes do Bootstrap:

- `.btn`: aparência comum dos botões.
- `.btn-danger`: botão vermelho de despesa.
- `.btn-success`: botão verde de entrada.
- `.btn-primary`: botão azul de investimento.
- `.btn-purple`: classe própria para o botão de metas.
- `.form-control`: campos e seletores do Bootstrap.
- `:focus`: aparência do campo quando selecionado.
- `::placeholder`: aparência do texto de orientação.

Exemplo:

```css
.form-control:focus {
    background: #1a2638;
    color: white;
    border-color: #3979ee;
    box-shadow: 0 0 0 .15rem rgba(57,121,238,.15);
}
```

## 11. Cartões de investimento e metas

```css
.investment-grid, .goal-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
}
.progress {
    height: 6px;
    background: #202c3d;
}
.progress-bar {
    background: var(--purple);
}
```

As grades organizam os cartões em três colunas em telas maiores. A classe `.progress` é o fundo da barra e `.progress-bar` representa a parte preenchida. O JavaScript define a largura da barra de acordo com o percentual da meta.

## 12. Responsividade com media queries

O projeto possui dois pontos principais de adaptação:

```css
@media (max-width: 1100px) {
    .summary-grid { grid-template-columns: repeat(3, 1fr); }
    .investment-grid, .goal-grid { grid-template-columns: repeat(2, 1fr); }
}
```

Quando a tela tem até 1100 pixels, os cartões passam a usar menos colunas.

```css
@media (max-width: 767px) {
    .sidebar { transform: translateX(-100%); }
    .main-area { margin-left: 0; }
    .mobile-menu { display: inline-block; }
    .summary-grid { grid-template-columns: repeat(2, 1fr); }
    .dashboard-grid { grid-template-columns: 1fr; }
}
```

Em telas pequenas:
- o menu lateral começa fora da tela;
- a área principal ocupa a largura disponível;
- o botão de menu aparece;
- os cartões passam para duas colunas;
- os gráficos ficam um abaixo do outro;
- grades de investimentos e metas passam a uma coluna.

A classe `.sidebar.open` remove o deslocamento do menu, permitindo que o JavaScript o mostre quando o botão for clicado.

## 13. Como investigar um estilo

1. Abra a página no navegador.
2. Clique com o botão direito em um elemento e escolha Inspecionar.
3. Veja quais classes estão aplicadas.
4. Pesquise essa classe em `style.css`.
5. Altere temporariamente uma propriedade e observe o resultado.
6. Desfaça a alteração ou salve a mudança desejada.

## 14. Exercícios

1. Localize a variável que define a cor de fundo geral.
2. Mude temporariamente a largura da sidebar e observe o espaço da área principal.
3. Altere o número de colunas de `.summary-grid`.
4. Explique a diferença entre Flexbox e Grid usando exemplos deste projeto.
5. Explique o que acontece dentro de `@media (max-width: 767px)`.
