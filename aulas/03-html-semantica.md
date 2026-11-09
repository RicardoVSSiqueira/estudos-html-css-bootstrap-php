# Aula 03 — HTML: estrutura semântica

**Objetivo:** organizar as áreas de uma página.

- `header`: cabeçalho.
- `nav`: navegação.
- `main`: conteúdo principal.
- `aside`: conteúdo lateral.
- `section`: seção temática.
- `article`: conteúdo independente.
- `footer`: rodapé.

```html
<header><h1>Minhas Finanças</h1></header>
<nav><a href="index.php">Início</a></nav>
<main>
    <section>
        <h2>Resumo financeiro</h2>
        <article><h3>Saldo atual</h3><p>R$ 0,00</p></article>
    </section>
</main>
<footer><p>Projeto de estudos</p></footer>
```

**Pratique:** localize `aside`, `nav`, `main`, `section` e `article` no `index.php`.

**Exercícios:** qual tag representa o conteúdo principal? Qual agrupa links? Monte uma página com cabeçalho, navegação, conteúdo e rodapé.