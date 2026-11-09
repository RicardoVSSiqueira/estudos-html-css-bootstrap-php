# Aula 19 — MySQL: banco, tabelas e registros

**Objetivo:** guardar dados permanentemente.

```sql
CREATE DATABASE minhas_financas;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

INSERT INTO categorias (nome) VALUES ('Alimentação');

SELECT * FROM categorias;
```

Banco agrupa tabelas; tabela organiza dados; coluna define informação; registro é uma linha; chave primária identifica o registro.

**Pratique:** no phpMyAdmin, crie o banco, a tabela, cadastre três categorias e consulte os registros.

**Exercícios:** o que fazem CREATE DATABASE, CREATE TABLE, INSERT e SELECT?