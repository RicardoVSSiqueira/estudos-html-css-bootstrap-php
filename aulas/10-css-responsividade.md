# Aula 10 — CSS: responsividade

**Objetivo:** adaptar a página a diferentes larguras de tela.

```css
@media (max-width: 768px) {
    .painel-graficos { grid-template-columns: 1fr; }
    .resumo { grid-template-columns: 1fr; }
}
```

Uma media query aplica regras quando a condição de tela é atendida.

**Pratique:** abra o site, pressione F12, ative a visualização móvel e observe as mudanças. Localize as media queries no final do CSS.

**Exercícios:** o que é responsividade? Por que ela importa? Faça os cartões ficarem em uma coluna em telas estreitas.