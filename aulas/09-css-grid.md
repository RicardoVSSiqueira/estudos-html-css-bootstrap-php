# Aula 09 — CSS: Grid

**Objetivo:** criar grades de cartões.

```css
.lista-cartoes {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}
```

`display: grid` ativa Grid; `grid-template-columns` define colunas; `repeat(3, 1fr)` cria três colunas iguais; `gap` separa os itens.

No projeto, `.resumo` organiza os cartões usando Grid.

**Pratique:** altere temporariamente a grade para duas e depois três colunas.

**Exercícios:** o que significa `1fr`? Crie uma grade com duas colunas.