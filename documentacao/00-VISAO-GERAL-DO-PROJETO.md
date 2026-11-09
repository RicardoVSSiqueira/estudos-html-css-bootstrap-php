# Minhas Finanças — visão geral do projeto

## 1. O que é o projeto?

O **Minhas Finanças** é uma aplicação de front-end para organizar informações financeiras pessoais. A interface permite visualizar um resumo financeiro e separar os registros em quatro áreas: gastos, entradas, investimentos e dinheiro guardado (metas).

Nesta etapa, o projeto funciona no navegador. Os registros são armazenados com `localStorage`, recurso do próprio navegador. **Ainda não há PHP, API, MySQL, autenticação ou banco de dados remoto.** Esses recursos pertencem a uma etapa futura.

## 2. O que cada tecnologia faz?

| Tecnologia | Responsabilidade neste projeto |
|---|---|
| HTML5 | Cria o conteúdo e a estrutura de cada página. |
| CSS3 | Define cores, tamanhos, espaçamentos, posicionamento e responsividade. |
| Bootstrap 4.6.2 | Fornece classes prontas para formulários, botões, grid e janelas modais. |
| Bootstrap Icons 1.11.3 | Fornece os ícones usados no menu, cartões e ações. |
| JavaScript | Lê formulários, calcula valores, atualiza listas e gráficos e exclui registros. |
| localStorage | Mantém os dados no navegador mesmo depois de fechar e abrir a página. |
| Chart.js 2.9.4 | Desenha os gráficos do Dashboard. |
| jQuery e Popper | São dependências usadas pelo Bootstrap 4 para componentes como os modais. |

## 3. Estrutura de pastas

```text
estudos-html-css-bootstrap-php/
├── aulas/                         # Material de estudo dos fundamentos
├── documentacao/                  # Explicações do projeto
└── projeto/
    ├── index.html                 # Dashboard
    ├── paginas/
    │   ├── gastos.html
    │   ├── entradas.html
    │   ├── investimentos.html
    │   └── guardado.html
    ├── css/
    │   └── style.css              # Estilo compartilhado
    └── js/
        └── script.js              # Lógica compartilhada
```

### Por que existem várias páginas HTML?

Cada arquivo HTML representa uma tela independente. Por exemplo, ao clicar em Gastos, o navegador abre `paginas/gastos.html`. O menu é repetido em cada arquivo para que a navegação continue disponível.

O CSS e o JavaScript ficam em arquivos compartilhados. Assim, não é necessário escrever o estilo e toda a lógica novamente em cada página.

## 4. Para que serve cada página?

### Dashboard — `projeto/index.html`

É a tela inicial. Mostra:
- saldo geral, calculado como entradas menos gastos;
- total de entradas;
- total de gastos;
- total aplicado em investimentos;
- total guardado nas metas;
- gráfico mensal de entradas e gastos;
- gráfico de gastos por categoria;
- últimas transações.

### Gastos — `projeto/paginas/gastos.html`

Apresenta as despesas cadastradas. O formulário permite informar nome, valor, data, categoria, forma de pagamento e descrição. Também há busca por nome e filtro por categoria.

### Entradas — `projeto/paginas/entradas.html`

Apresenta valores recebidos. O formulário recebe descrição, valor, data e método de recebimento. A busca filtra pelo texto da descrição.

### Investimentos — `projeto/paginas/investimentos.html`

Mostra nome, tipo, valor aplicado, valor atual, resultado e data. O resultado é calculado subtraindo o valor aplicado do valor atual.

### Guardado — `projeto/paginas/guardado.html`

Representa objetivos financeiros. Cada meta possui nome, valor desejado e valor já guardado. A barra de progresso mostra quanto da meta foi alcançado.

## 5. Como as páginas se conectam?

Os links do menu usam o atributo `href`. Exemplo na página inicial:

```html
<a href="paginas/gastos.html" class="nav-link">
    <i class="bi bi-cart3"></i> Gastos
</a>
```

O caminho é relativo ao arquivo atual. Como `index.html` está dentro da pasta `projeto`, o caminho começa em `paginas/`.

Nas páginas que estão dentro da pasta `paginas`, os caminhos para CSS, JavaScript e Dashboard começam com `../`, porque é necessário voltar um nível:

```html
<link rel="stylesheet" href="../css/style.css">
<a href="../index.html">Dashboard</a>
<script src="../js/script.js"></script>
```

## 6. Como executar o projeto?

1. Baixe ou clone o repositório.
2. Abra a pasta do projeto no Visual Studio Code.
3. Abra a pasta `projeto`.
4. Abra `index.html` no navegador. Se usar a extensão Live Server, clique com o botão direito em `index.html` e escolha **Open with Live Server**.
5. Use o menu lateral para abrir as outras páginas.

Como esta etapa é somente front-end, não é necessário iniciar Apache, PHP ou MySQL no XAMPP.

## 7. Fluxo geral de funcionamento

1. O navegador carrega o HTML da página.
2. O HTML carrega o Bootstrap, os ícones, o CSS do projeto e o JavaScript.
3. O JavaScript consulta o `localStorage`.
4. Se já existirem dados salvos, eles são carregados. Caso contrário, são usados os registros de demonstração definidos em `initialData`.
5. As funções JavaScript atualizam os elementos HTML com os valores e listas.
6. Quando um formulário é enviado, o JavaScript cria um objeto, adiciona esse objeto à lista correspondente e salva os dados.
7. A interface é renderizada novamente para mostrar a alteração.

## 8. Limitações atuais

- Os dados ficam apenas no navegador e no perfil em que foram cadastrados.
- Limpar os dados do site no navegador pode apagar os registros.
- Não há usuários diferentes nem login.
- Não há sincronização entre dispositivos.
- Os registros iniciais são exemplos de demonstração.
- O botão **Limpar dados locais** remove os dados salvos e volta aos exemplos iniciais.

Essas limitações são esperadas para a fase de front-end. Na futura etapa de back-end, o armazenamento poderá ser transferido para PHP e MySQL.
