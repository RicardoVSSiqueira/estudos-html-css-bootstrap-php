# Aula 18 — PHP: recebendo formulários

**Objetivo:** enviar dados HTML para o servidor.

HTML:
```html
<form action="receber.php" method="POST">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" id="descricao" required>
    <button type="submit">Enviar</button>
</form>
```

PHP:
```php
<?php
$descricao = $_POST["descricao"] ?? "";
if ($descricao !== "") {
    echo htmlspecialchars($descricao);
} else {
    echo "Informe uma descrição.";
}
?>
```

`action` indica o destino; `POST` envia dados no corpo da requisição; `$_POST` recebe os valores; `htmlspecialchars` ajuda a exibir texto com segurança.

**Exercícios:** adicione valor ao formulário, receba no PHP e mostre os dados. Valide os campos no servidor.