# JavaScript — explicação passo a passo do projeto Minhas Finanças

O arquivo `projeto/js/script.js` concentra a lógica das páginas. Ele carrega os dados, calcula totais, monta listas e gráficos, trata os formulários e responde às ações do usuário.

## 1. Dados iniciais: `initialData`

O arquivo começa criando um objeto:

```javascript
const initialData = {
    expenses: [ /* despesas de exemplo */ ],
    incomes: [ /* entradas de exemplo */ ],
    investments: [ /* investimentos de exemplo */ ],
    goals: [ /* metas de exemplo */ ]
};
```

- `const` cria uma variável cuja referência não será reatribuída.
- `initialData` é o nome escolhido para os dados iniciais.
- `{}` representa um objeto.
- Cada propriedade contém um array `[]`.
- Cada item dentro dos arrays é outro objeto, com propriedades como `id`, `name`, `value` e `date`.

### Estrutura de uma despesa

```javascript
{
    id: 1,
    name: "Jantar com amigos",
    value: 180,
    date: "2026-11-05",
    category: "Alimentação",
    payment: "Cartão de Crédito",
    description: ""
}
```

- `id`: identificador do registro.
- `name`: nome da despesa.
- `value`: valor numérico.
- `date`: data no formato ano-mês-dia.
- `category`: categoria da despesa.
- `payment`: forma de pagamento.
- `description`: observação.

As outras coleções têm campos próprios. Investimentos usam `applied` e `current`; metas usam `target` e `saved`.

## 2. Carregamento e variáveis de estado

```javascript
let data = loadData();
let monthlyChart = null;
let categoryChart = null;
```

- `let` permite que a variável receba outro valor posteriormente.
- `data` recebe os dados recuperados pela função `loadData()`.
- As variáveis dos gráficos começam com `null`, pois ainda não há gráficos criados.

## 3. localStorage: carregar e salvar

```javascript
function loadData() {
    const saved = localStorage.getItem("minhasFinancas");
    return saved ? JSON.parse(saved) : JSON.parse(JSON.stringify(initialData));
}
function saveData() {
    localStorage.setItem("minhasFinancas", JSON.stringify(data));
}
```

### `loadData()`

1. `localStorage.getItem(...)` procura a chave `minhasFinancas` no armazenamento do navegador.
2. Se encontrar dados, eles são recebidos como texto em `saved`.
3. `JSON.parse(saved)` transforma o texto JSON em objeto JavaScript.
4. O operador ternário `condição ? valor1 : valor2` escolhe entre duas alternativas.
5. Se não houver dados salvos, `JSON.stringify(initialData)` transforma o objeto inicial em texto e `JSON.parse(...)` cria uma cópia em memória.

### `saveData()`

1. `JSON.stringify(data)` transforma o objeto JavaScript em texto JSON.
2. `localStorage.setItem(...)` grava esse texto com a chave `minhasFinancas`.

**Atenção:** localStorage é armazenamento local do navegador, não é um banco de dados MySQL e não envia dados para um servidor.

## 4. Função para formatar dinheiro

```javascript
function money(value) {
    return Number(value || 0).toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    });
}
```

- A função recebe um valor.
- `value || 0` usa zero caso o valor esteja vazio ou seja considerado falso.
- `Number(...)` converte o conteúdo para número.
- `toLocaleString("pt-BR", ...)` formata de acordo com as convenções brasileiras.
- `style: "currency"` indica que o formato é monetário.
- `currency: "BRL"` define o Real brasileiro.

Exemplo: o número `180` aparece como `R$ 180,00`.

## 5. Função para somar valores

```javascript
function total(items, field = "value") {
    return items.reduce((sum, item) => sum + Number(item[field] || 0), 0);
}
```

- `items` é o array que será somado.
- `field = "value"` define um valor padrão para a propriedade que será somada.
- `reduce()` percorre o array e acumula um resultado.
- `sum` representa o acumulador.
- `item` representa o registro atual.
- `item[field]` acessa a propriedade indicada por `field`.
- `0` no final é o valor inicial do acumulador.

Para somar o valor aplicado dos investimentos, a chamada usa `total(data.investments, "applied")`.

## 6. Formatação de datas

```javascript
function dateLabel(value) {
    if (!value) return "";
    const parts = value.split("-");
    return parts.length === 3
        ? parts[2] + "/" + parts[1] + "/" + parts[0]
        : value;
}
```

- `if (!value)` verifica se não foi informado um valor.
- `split("-")` divide a data nas partes separadas por hífen.
- O operador ternário verifica se existem três partes.
- A data `2026-11-05` é apresentada como `05/11/2026`.

## 7. Proteção de texto inserido na página

```javascript
function escapeHTML(value) {
    return String(value).replace(/[&<>"']/g, char => ({
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#039;"
    }[char]));
}
```

Essa função transforma caracteres especiais em entidades HTML antes de inserir nomes e descrições na página. Isso reduz o risco de que um texto digitado seja interpretado como marcação HTML.

- `String(value)` converte o valor para texto.
- `replace(...)` procura caracteres que precisam ser substituídos.
- A expressão regular entre barras lista os caracteres procurados.
- A função de substituição retorna a versão segura de cada caractere.

## 8. Atualização dos totais: `renderSummary()`

A função calcula:
- total das entradas;
- total dos gastos;
- saldo: entradas menos gastos;
- soma dos valores aplicados;
- soma do dinheiro guardado.

Depois, atualiza os elementos HTML por meio de `document.getElementById(...).textContent`.

Exemplo:

```javascript
const income = total(data.incomes);
const expense = total(data.expenses);

if (document.getElementById("balanceTotal")) {
    document.getElementById("balanceTotal").textContent = money(income - expense);
}
```

- `document` representa a página carregada.
- `getElementById` procura um elemento pelo ID.
- `textContent` altera o texto que aparece dentro do elemento.
- O `if` verifica se o elemento existe antes de tentar alterá-lo.

Essa verificação é importante porque cada arquivo HTML tem apenas parte dos elementos do sistema.

## 9. Renderização de gastos e entradas

As funções `renderExpenses()` e `renderIncomes()` montam as listas.

Exemplo do início de `renderExpenses()`:

```javascript
const target = document.getElementById("expenseList");
if (!target) return;

const query = (document.getElementById("expenseSearch")?.value || "").toLowerCase();
const category = document.getElementById("expenseCategoryFilter")?.value || "";
const list = data.expenses.filter(item =>
    item.name.toLowerCase().includes(query) &&
    (!category || item.category === category)
);
```

Passo a passo:

1. Procura o contêiner que receberá a lista.
2. Se o contêiner não existir naquela página, `return` encerra a função.
3. Lê o texto digitado no campo de busca.
4. `?.` é o encadeamento opcional: evita erro caso o elemento não exista.
5. `toLowerCase()` converte o texto para minúsculas, facilitando a busca sem diferenciar maiúsculas.
6. `filter()` cria um novo array apenas com os registros que atendem às condições.
7. `includes()` verifica se o nome contém o texto pesquisado.
8. A segunda condição permite todas as categorias quando o filtro está vazio, ou apenas a categoria selecionada.

Depois, a função usa `innerHTML` e `map()` para montar o HTML de cada registro. Se nenhum registro for encontrado, mostra uma mensagem vazia.

A função `renderIncomes()` segue a mesma lógica, mas filtra as entradas pelo nome.

## 10. Renderização de investimentos

`renderInvestments()` percorre os investimentos e calcula o resultado:

```javascript
const result = Number(item.current) - Number(item.applied);
const percent = item.applied
    ? (result / item.applied * 100)
    : 0;
```

- Resultado é valor atual menos valor aplicado.
- O percentual é o resultado dividido pelo valor aplicado, multiplicado por 100.
- Se o valor aplicado for zero, o percentual fica em zero para evitar divisão por zero.
- `toFixed(1)` apresenta uma casa decimal no percentual.

A função cria um cartão para cada investimento e mostra se o resultado é positivo ou negativo.

## 11. Renderização das metas

`renderGoals()` calcula o percentual concluído:

```javascript
const percent = item.target
    ? Math.min(100, Number(item.saved) / Number(item.target) * 100)
    : 0;
```

- Divide o valor guardado pelo valor desejado.
- Multiplica por 100 para obter porcentagem.
- `Math.min(100, ...)` limita a barra a 100%, mesmo se o valor guardado ultrapassar a meta.
- O percentual é aplicado à largura da barra de progresso.

## 12. Transações recentes

`renderRecent()` combina despesas e entradas:

- `map()` cria uma versão dos registros com uma propriedade que identifica o tipo.
- O operador spread `...` copia as propriedades do objeto original.
- `sort()` organiza as transações pela data.
- `slice(0, 5)` seleciona as cinco primeiras.
- O HTML é montado no elemento `recentTransactions`.

## 13. Gráficos com Chart.js

A função `renderCharts()` primeiro verifica se Chart.js e os dois elementos `canvas` existem.

O gráfico mensal:
1. junta entradas e gastos;
2. agrupa os valores por ano e mês;
3. separa as somas de entradas e despesas;
4. cria rótulos para os meses;
5. instancia um gráfico do tipo `bar`.

O gráfico de categorias:
1. percorre as despesas;
2. soma os valores por categoria;
3. cria um gráfico do tipo `doughnut`.

A opção `responsive: true` permite que o gráfico acompanhe o tamanho do contêiner. `maintainAspectRatio: false` permite que a altura seja controlada pelo CSS.

## 14. Atualização geral: `renderAll()`

```javascript
function renderAll() {
    renderSummary();
    renderExpenses();
    renderIncomes();
    renderInvestments();
    renderGoals();
    renderRecent();
    renderCharts();
}
```

Essa função chama todas as funções de atualização. Cada função verifica se o elemento de destino existe. Por isso o mesmo arquivo JavaScript pode ser utilizado nas cinco páginas.

## 15. Excluir registros

```javascript
function removeRecord(collection, id) {
    if (!confirm("Deseja realmente excluir este registro?")) return;
    data[collection] = data[collection].filter(item => item.id !== id);
    saveData();
    renderAll();
}
window.removeRecord = removeRecord;
```

- `confirm()` mostra uma pergunta de confirmação.
- Se a pessoa cancelar, `return` encerra a função.
- `filter()` mantém todos os registros cujo ID seja diferente do ID selecionado.
- `saveData()` grava a lista atualizada.
- `renderAll()` atualiza a interface.
- `window.removeRecord = removeRecord` disponibiliza a função no objeto global `window), pois os botões criados dinamicamente chamam essa função pelo atributo `onclick`.

## 16. Conectar os formulários: `connectForm()`

A função recebe quatro informações:
- ID do formulário;
- nome da coleção de dados;
- função que monta o objeto;
- ID do modal.

Primeiro, procura o formulário. Se não existir na página atual, encerra. Se existir, adiciona um evento `submit`.

Quando o formulário é enviado:
1. `event.preventDefault()` impede o envio tradicional que recarregaria a página.
2. `buildItem()` monta um objeto com os valores digitados.
3. `unshift()` adiciona o novo registro no início do array.
4. `saveData()` salva os dados.
5. `renderAll()` atualiza as listas e os totais.
6. `$("#" + modalId).modal("hide")` fecha o modal usando Bootstrap 4.
7. `event.target.reset()` limpa os campos do formulário.

## 17. Cadastro de cada tipo de registro

O projeto chama `connectForm()` quatro vezes:

- `expenseForm` adiciona dados em `expenses`.
- `incomeForm` adiciona dados em `incomes`.
- `investmentForm` adiciona dados em `investments`.
- `goalForm` adiciona dados em `goals`.

`Date.now()` gera um identificador baseado no horário atual em milissegundos. `Number(...)` converte os valores numéricos dos campos para números.

## 18. Eventos de busca, filtro e menu

O código registra eventos:

- `input`: executa a busca enquanto o texto é digitado.
- `change`: executa o filtro quando a categoria muda.
- `click`: abre ou fecha o menu lateral no celular.

Antes de registrar cada evento, o código verifica se o elemento existe. Isso evita erros nas páginas que não possuem aquele campo.

## 19. Limpar dados locais

O botão `clearData` pergunta se a pessoa deseja continuar. Se confirmar:

1. `localStorage.removeItem("minhasFinancas")` apaga a chave salva.
2. `data` recebe uma nova cópia dos dados de demonstração.
3. `renderAll()` atualiza a tela.

Essa ação não apaga dados de um servidor, porque nesta versão não existe servidor conectado.

## 20. Inicialização do arquivo

No final do JavaScript:
- a data atual é escrita no cabeçalho;
- os campos de data dos formulários recebem a data atual;
- `renderAll()` executa a primeira atualização da interface.

## 21. Fluxo completo de um cadastro

Exemplo: cadastrar uma despesa.

1. A pessoa abre Gastos.
2. Clica em Nova Despesa.
3. O Bootstrap abre `expenseModal`.
4. A pessoa preenche os campos.
5. O navegador verifica os campos obrigatórios.
6. O evento `submit` chama a função conectada ao formulário.
7. O JavaScript cria um objeto de despesa.
8. O objeto é inserido no array `data.expenses`.
9. Os dados são salvos no localStorage.
10. As listas e os totais são renderizados novamente.
11. O modal fecha e os campos são limpos.

## 22. Limitações e pontos para uma próxima etapa

- `localStorage` não substitui um banco de dados.
- Não existe login ou separação de dados por usuário.
- O armazenamento depende do navegador e do dispositivo.
- Os dados de demonstração estão definidos diretamente no JavaScript.
- A futura integração com PHP/MySQL exigirá substituir a leitura e gravação locais por requisições ao servidor.

## 23. Exercícios

1. Encontre o array que guarda as despesas.
2. Explique o que `JSON.stringify()` faz.
3. Explique por que `renderExpenses()` começa verificando se `expenseList` existe.
4. Qual a diferença entre `map()` e `filter()` no contexto deste código?
5. Como o saldo geral é calculado?
6. O que acontece quando uma despesa é excluída?
7. Por que o projeto usa `localStorage` nesta etapa?
