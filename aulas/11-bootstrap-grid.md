# Aula 11 — Bootstrap: introdução e grid

**Objetivo:** usar o sistema de colunas do Bootstrap 4.6.

O projeto carrega Bootstrap 4.6.2 pelo link CDN no `head`.

```html
<div class="container">
    <div class="row">
        <div class="col-md-6">Primeira coluna</div>
        <div class="col-md-6">Segunda coluna</div>
    </div>
</div>
```

`container` centraliza; `row` cria linha; `col-md-6` ocupa metade da linha a partir do breakpoint médio.

**Pratique:** crie duas colunas e depois teste `col-md-4` com `col-md-8`.

**Exercícios:** para que servem container e row? O que significa o número 6?