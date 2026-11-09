# Aula 06 — MySQL e banco de dados

## Objetivo

Entender para que serve um banco de dados e como ele será usado para guardar as informações financeiras.

## 1. O que é um banco de dados?

É um local organizado para armazenar informações. No Minhas Finanças, futuramente poderemos guardar usuários, categorias, entradas, gastos e investimentos.

## 2. Tabela, coluna e registro

Imagine uma tabela chamada `categorias`:

| id | nome |
|---:|---|
| 1 | Alimentação |
| 2 | Transporte |
| 3 | Moradia |

- Tabela: conjunto de dados sobre um assunto.
- Coluna: característica armazenada, como `nome`.
- Registro: uma linha com os dados de uma categoria.
- ID: identificador que diferencia cada registro.

## 3. Primeiro SQL

No phpMyAdmin, abra a aba SQL e execute:

```sql
CREATE DATABASE minhas_financas;
```

Depois selecione o banco criado e execute:

```sql
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);
```

- `CREATE DATABASE` cria um banco de dados.
- `CREATE TABLE` cria uma tabela.
- `INT` guarda números inteiros.
- `AUTO_INCREMENT` gera o próximo número automaticamente.
- `PRIMARY KEY` define a chave primária.
- `VARCHAR(100)` guarda texto com até 100 caracteres.
- `NOT NULL` exige um valor.

## 4. Inserir e consultar

```sql
INSERT INTO categorias (nome)
VALUES ('Alimentação');

SELECT * FROM categorias;
```

O comando `INSERT INTO` adiciona um registro. O comando `SELECT` consulta dados.

## Exercícios

1. Crie o banco `minhas_financas`.
2. Crie a tabela `categorias`.
3. Cadastre as categorias Alimentação, Transporte e Moradia.
4. Consulte os registros com `SELECT * FROM categorias;`.

**Próxima etapa:** aprender a conectar PHP ao MySQL e depois desenvolver as operações de cadastro, listagem, edição e exclusão.
