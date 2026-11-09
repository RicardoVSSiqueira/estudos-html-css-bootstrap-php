# Aula 07 — CSS: modelo de caixa e bordas

**Objetivo:** entender o espaço ocupado por cada elemento.

```css
.cartao {
    width: 300px;
    padding: 20px;
    border: 1px solid #263449;
    margin: 15px;
    border-radius: 10px;
    box-sizing: border-box;
}
```

`width` define largura; `padding` espaço interno; `border` borda; `margin` espaço externo; `border-radius` arredonda cantos; `box-sizing` controla como largura e altura são calculadas.

**Pratique:** localize `.card-resumo` e altere padding e border-radius.

**Exercícios:** explique margin e padding. Adicione borda a um cartão.