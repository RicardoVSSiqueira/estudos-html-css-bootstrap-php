# Aula 00 — Como estudar pelo repositório

## Objetivo

Aprender a usar este repositório como uma apostila prática e acompanhar a construção do sistema Minhas Finanças.

## 1. Conheça as pastas

- `index.php`: página principal do sistema. Por enquanto, ela contém HTML e ainda não utiliza PHP para buscar dados.
- `assets/css/style.css`: regras visuais da página.
- `assets/js/script.js`: espaço para os comportamentos com JavaScript.
- `aulas/`: apostila com as explicações e exercícios.

## 2. Preparar o computador

1. Instale o XAMPP.
2. Abra o painel do XAMPP.
3. Inicie o serviço Apache.
4. Localize a pasta `htdocs` dentro da instalação do XAMPP.
5. Clone ou baixe este repositório para dentro de `htdocs`.
6. Abra no navegador: `http://localhost/estudos-html-css-bootstrap-php/`.

Se você ainda não clonou o projeto, no GitHub clique no botão **Code** e copie o endereço HTTPS. No terminal, entre na pasta `htdocs` e execute:

```bash
git clone https://github.com/RicardoVSSiqueira/estudos-html-css-bootstrap-php.git
```

## 3. Como acompanhar seu progresso

Depois de concluir uma aula, marque-a como concluída no seu próprio controle de estudos. Faça pequenas alterações, teste no navegador e salve seu trabalho com Git.

Comandos básicos:

```bash
git status
git add .
git commit -m "estudo: conclui aula 01 de HTML"
git push
```

- `git status` mostra quais arquivos foram modificados.
- `git add .` prepara as alterações para o commit.
- `git commit` registra uma versão com uma mensagem.
- `git push` envia os commits para o GitHub.

## Exercício

1. Abra a página principal do repositório.
2. Entre na pasta `aulas`.
3. Abra esta aula e depois a Aula 01.
4. Explique com suas palavras para que servem as pastas `assets/css` e `assets/js`.

**Critério para avançar:** conseguir localizar os arquivos e abrir o projeto no navegador.
