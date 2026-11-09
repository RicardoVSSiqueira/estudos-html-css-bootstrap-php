# Aula 20 — PHP e MySQL: conexão e CRUD

**Objetivo:** conectar o formulário ao banco de dados.

## Fluxo
1. A pessoa preenche o formulário.
2. O navegador envia os dados ao PHP.
3. O PHP valida os valores.
4. O PHP conversa com o MySQL.
5. O banco grava ou consulta.
6. O PHP responde ao navegador.

## CRUD
- Create: inserir.
- Read: consultar.
- Update: atualizar.
- Delete: excluir.

Usaremos consultas preparadas com PDO ou MySQLi. Não concatene diretamente dados digitados em comandos SQL e não publique senhas reais do banco no GitHub.

**Exercícios:** explique o que significa CRUD, qual o papel do PHP e qual o papel do MySQL. Nas próximas práticas implementaremos cada operação separadamente.