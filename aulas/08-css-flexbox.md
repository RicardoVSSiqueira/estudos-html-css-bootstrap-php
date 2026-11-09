# Aula 08 — CSS: Flexbox

**Objetivo:** posicionar elementos em linhas e colunas.

```css
.linha {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
}
```

`display: flex` ativa Flexbox; `justify-content` distribui no eixo principal; `align-items` alinha no eixo transversal; `gap` define espaço; `flex-direction` muda direção.

No projeto, `.layout` usa Flexbox para posicionar menu e conteúdo.

**Pratique:** crie dois blocos e teste `center`, `space-between` e `flex-direction: column`.

**Exercícios:** o que ativa o Flexbox? O que faz `gap`?