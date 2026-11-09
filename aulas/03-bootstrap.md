# Aula 03 — Bootstrap 4.6

## Objetivo

Conhecer o Bootstrap e entender como ele pode acelerar a criação de interfaces sem substituir o aprendizado de HTML e CSS.

## 1. O que é Bootstrap?

Bootstrap é um framework CSS que oferece classes prontas para montar layouts responsivos, botões, formulários, tabelas e outros componentes.

Este projeto utiliza a versão 4.6.2.

## 2. Como o projeto carrega o Bootstrap?

No `<head>` do `index.php`, procure:

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
```

Essa linha carrega o CSS do Bootstrap pela internet. Por isso, é necessário estar conectado para carregar esse arquivo do CDN.

## 3. Classes úteis para conhecer

- `container`: cria uma área centralizada com largura ajustada.
- `row`: cria uma linha do sistema de grid.
- `col-md-6`: cria uma coluna que ocupa metade da linha a partir do tamanho médio.
- `btn`: aparência base de botão.
- `btn-primary`: estilo de botão principal.
- `form-control`: estilo de campo de formulário.
- `mt-3`: margem superior.
- `mb-3`: margem inferior.
- `p-3`: espaçamento interno.

## 4. Exemplo prático

Crie temporariamente dentro do conteúdo principal:

```html
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-success">Adicionar entrada</button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-danger">Adicionar gasto</button>
        </div>
    </div>
</div>
```

Observe que as classes do Bootstrap já aplicam estilos e organizam as colunas.

## 5. Passo a passo

1. Abra `index.php`.
2. Confirme que o link do Bootstrap está dentro de `<head>`.
3. Adicione o exemplo acima dentro de `<main>`.
4. Salve e atualize o navegador.
5. Redimensione a janela para observar o comportamento das colunas.

## Exercícios

1. Crie um botão com `btn btn-primary`.
2. Crie um campo de texto com `form-control`.
3. Adicione `mt-3` a um elemento e observe o espaçamento.
4. Explique por que o Bootstrap não substitui completamente o CSS próprio do projeto.

**Atenção:** o projeto também possui CSS próprio. Se duas regras tentarem estilizar o mesmo elemento, a ordem e a especificidade das regras podem influenciar o resultado.
