# Aula 17 — PHP: condições, repetições e funções

**Objetivo:** criar regras no sistema.

```php
$valor = 150;
if ($valor > 100) {
    echo "Gasto acima de 100";
} else {
    echo "Gasto de até 100";
}
```

```php
$contador = 1;
while ($contador <= 3) {
    echo $contador;
    $contador++;
}
```

```php
function mostrarMensagem() {
    echo "Bem-vindo!";
}
mostrarMensagem();
```

`if/else` decide; `while` repete enquanto a condição for verdadeira; `function` cria um bloco reutilizável.

**Exercícios:** verifique se um gasto ultrapassa 500; conte de 1 a 5; crie uma função que exiba uma mensagem.