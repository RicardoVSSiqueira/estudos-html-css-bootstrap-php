# Aula 04 — JavaScript do front-end Minhas Finanças

Arquivo: `projeto/js/script.js`. O JavaScript dá comportamento à interface. Nesta fase ele guarda os registros no navegador; ainda não existe comunicação com PHP ou MySQL.

## 1. Dados iniciais

```javascript
const initialData = {
    expenses: [],
    incomes: [],
    investments: [],
    goals: []
};
```

- `const` cria uma variável que não será reatribuída.
- `initialData` guarda os dados de demonstração.
- Cada propriedade representa um grupo de registros.

No arquivo real existem exemplos preenchidos para que os cartões, listas e gráficos apareçam desde a primeira abertura.

## 2. Guardar dados no navegador

```javascript
function loadData() {
    const saved = localStorage.getItem("minhasFinancas");
    return saved ? JSON.parse(saved) : JSON.parse(JSON.stringify(initialData));
}

function saveData() {
    localStorage.setItem("minhasFinancas", JSON.stringify(data));
}
```

- `function` declara uma função reutilizável.
- `localStorage.getItem` tenta recuperar o conteúdo salvo.
- `JSON.parse` transforma texto JSON em objeto JavaScript.
- O operador ternário escolhe os dados salvos ou uma cópia dos exemplos.
- `JSON.stringify` transforma o objeto em texto para guardar.
- `setItem` grava o texto no navegador.

Isso não é banco de dados. Os dados ficam somente naquele navegador e dispositivo.

## 3. Formatar valores em reais

```javascript
function money(value) {
    return Number(value || 0).toLocaleString("pt-BR", {
        style: "currency",
        currency: "BRL"
    });
}
```

- `Number` converte o valor para número.
- `value || 0` usa zero quando o valor está vazio.
- `toLocaleString` formata conforme a localidade.
- `pt-BR` usa o padrão brasileiro.
- `BRL` representa o real.

## 4. Navegação entre telas

```javascript
function showPage(page) {
    document.querySelectorAll(".page-section")
        .forEach(section => section.classList.remove("active"));

    const target = document.getElementById("page-" + page);
    if (target) target.classList.add("active");
}
```

- `document` representa a página HTML.
- `querySelectorAll` encontra todos os elementos com a classe.
- `forEach` percorre cada seção encontrada.
- `classList.remove` remove a classe que deixa a seção visível.
- `getElementById` procura a seção pelo id.
- `classList.add` adiciona `active` somente à seção escolhida.

O arquivo completo também atualiza o item selecionado da sidebar e o título do cabeçalho.

## 5. Eventos de formulário

```javascript
document.getElementById("expenseForm").addEventListener("submit", event => {
    event.preventDefault();
    // ler os campos, montar o registro e salvar
});
```

- `getElementById` localiza o formulário.
- `addEventListener` escuta um evento.
- `submit` acontece quando o formulário é enviado.
- `event` representa o evento recebido.
- `preventDefault` impede o envio tradicional e o recarregamento da página.

No projeto, a função `connectForm` evita repetir toda essa estrutura para cada formulário.

## 6. Atualizar a interface

As funções `renderSummary`, `renderExpenses`, `renderIncomes`, `renderInvestments`, `renderGoals` e `renderRecent` atualizam os elementos HTML com base no objeto `data`.

A função `renderAll` chama todas elas depois de um cadastro ou exclusão. Assim os totais e listas são atualizados juntos.

## 7. Gráficos

A função `renderCharts` usa a biblioteca Chart.js. Ela agrupa entradas e despesas por mês e monta um gráfico de barras. Depois soma os gastos por categoria e cria um gráfico de rosca.

O elemento HTML `canvas` é o local de desenho; o Chart.js recebe os rótulos, valores e opções visuais.

## 8. Teste completo

1. Abra o Dashboard.
2. Cadastre uma despesa.
3. Confira o total de gastos e o gráfico.
4. Atualize a página e confirme que o registro continua no mesmo navegador.
5. Exclua um registro e veja os totais mudarem.
6. Cadastre uma meta e confira a barra de progresso.

**Limite desta fase:** localStorage é temporário e local. Na fase PHP/MySQL, os formulários serão conectados ao servidor e os registros serão guardados no banco de dados.
