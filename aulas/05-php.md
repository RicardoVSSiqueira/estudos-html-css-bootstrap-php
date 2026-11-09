# Aula 05 — PHP: começando pelo servidor

## Objetivo

Entender o que é PHP e como executar um arquivo PHP localmente com o XAMPP.

## 1. O que é PHP?

PHP é uma linguagem executada no servidor. Ela pode receber dados de formulários, validar informações, consultar o banco de dados e gerar conteúdo HTML.

JavaScript normalmente é executado no navegador. PHP é executado no servidor.

## 2. Primeiro arquivo PHP

Crie `teste.php` dentro da pasta do projeto:

```php
<?php
    echo "Olá! Meu primeiro código PHP.";
?>
```

- `<?php` inicia o bloco PHP.
- `echo` envia um conteúdo para a resposta da página.
- `;` encerra a instrução.
- `?>` fecha o bloco PHP.

## 3. Executar com XAMPP

1. Coloque o projeto dentro de `htdocs`.
2. Inicie o Apache no XAMPP.
3. Acesse `http://localhost/estudos-html-css-bootstrap-php/teste.php`.
4. Confira a mensagem no navegador.

Não abra o arquivo PHP dando duplo clique nele. Ele precisa ser processado pelo servidor Apache com PHP.

## 4. PHP dentro do HTML

```php
<?php
    $nome = "Ricardo";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste PHP</title>
</head>
<body>
    <h1>Olá, <?php echo $nome; ?>!</h1>
</body>
</html>
```

A variável começa com `$`. O comando `echo` imprime o valor na página.

## Exercícios

1. Crie uma variável chamada `$mensagem`.
2. Guarde nela o texto "Estou aprendendo PHP".
3. Mostre o conteúdo usando `echo`.
4. Explique por que é necessário acessar o arquivo pelo endereço `localhost`.

**Importante:** nesta etapa ainda não vamos conectar o sistema ao banco de dados. Primeiro vamos aprender a executar e entender PHP.
