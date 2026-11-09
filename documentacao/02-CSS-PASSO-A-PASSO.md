# Aula 02 — Estilizando o Minhas Finanças com CSS

Arquivo utilizado: **`projeto/css/style.css`**. O CSS será estudado depois de compreender a estrutura HTML.

## 1. Variáveis de cores

```css
:root {
    --background: #050914;
    --sidebar: #080e1b;
    --panel: #0c1423;
    --border: #1c2a3d;
    --text: #f4f7fb;
    --muted: #8290a5;
    --green: #08b981;
    --red: #f04452;
}
```

- `:root` representa o elemento raiz do documento.
- Cada nome iniciado por `--` cria uma variável CSS.
- Os valores são cores em hexadecimal.
- Usamos `var(--background)` para reutilizar uma variável. Se mudarmos a cor aqui, todos os componentes que a utilizam acompanham a mudança.

## 2. Ajustes gerais

```css
* { box-sizing: border-box; }
body {
    margin: 0;
    background: var(--background);
    color: var(--text);
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
}
```

- `*` seleciona todos os elementos.
- `box-sizing: border-box` faz largura e altura incluírem padding e borda.
- `margin: 0` remove a margem padrão do navegador.
- `background` define o fundo.
- `color` define a cor padrão do texto.
- `font-family` escolhe a família de fontes.
- `font-size` define o tamanho inicial da fonte.

## 3. Sidebar fixa

```css
.sidebar {
    width: 238px;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 1000;
    padding: 22px 14px;
    background: var(--sidebar);
}
```

- `width`: largura do menu.
- `position: fixed`: mantém o menu preso à tela durante a rolagem.
- `top`, `bottom` e `left`: prendem o menu às bordas superior, inferior e esquerda.
- `z-index`: controla a sobreposição; um número maior fica na frente de elementos com valor menor.
- `padding`: espaço interno.
- `background`: cor de fundo da sidebar.

## 4. Área principal ao lado do menu

```css
.main-area {
    margin-left: 238px;
    padding: 28px 30px 40px;
}
```

A margem esquerda tem a mesma largura da sidebar. Assim o conteúdo não fica escondido atrás do menu. O padding cria respiro interno: 28 px em cima, 30 px nas laterais e 40 px embaixo.

## 5. Cartões com CSS Grid

```css
.summary-grid {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 13px;
}
```

- `display: grid` ativa o CSS Grid.
- `repeat(5, ...)` cria cinco colunas.
- `1fr` divide o espaço disponível em frações iguais.
- `minmax(0, 1fr)` permite que cada coluna encolha sem estourar o contêiner.
- `gap` define o espaço entre os cartões.

## 6. Cartões e painéis

```css
.panel, .summary-card {
    background: var(--panel);
    border: 1px solid var(--border);
    border-radius: 9px;
}
```

A vírgula permite aplicar as mesmas regras aos dois seletores. O fundo, a borda e o arredondamento criam a aparência de cartões escuros.

## 7. Cores de situação

```css
.positive { color: var(--green); }
.negative { color: var(--red); }
```

O JavaScript aplica essas classes aos valores. Entradas aparecem em verde e gastos em vermelho.

## 8. Responsividade

```css
@media (max-width: 767px) {
    .main-area {
        margin-left: 0;
        padding: 18px 14px 30px;
    }
    .summary-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
```

- `@media` aplica regras apenas quando a condição é verdadeira.
- `max-width: 767px` direciona a regra a telas estreitas.
- A margem do conteúdo vira zero porque a sidebar sai da posição visível.
- Os cartões passam de cinco colunas para duas.

O restante do arquivo também adapta gráficos, filtros, cartões de investimento e metas. Leia cada bloco `@media` e observe o que muda no celular.

## Exercícios

1. Mude temporariamente `--background` para outra cor.
2. Aumente a largura da sidebar e ajuste a margem de `.main-area` para o mesmo valor.
3. Altere o `gap` dos cartões.
4. Reduza a janela do navegador e observe a regra de responsividade.
5. Explique a diferença entre `margin` e `padding`.

**Critério para avançar:** conseguir explicar seletores, propriedades, variáveis, Grid, Flexbox, posicionamento e media queries.
