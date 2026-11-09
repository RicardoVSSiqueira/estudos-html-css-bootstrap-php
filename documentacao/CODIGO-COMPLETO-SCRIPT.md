# JavaScript completo — projeto/js/script.js

Este arquivo controla os dados e as interações do front-end. O mesmo script é carregado pelas cinco páginas e verifica a existência dos elementos antes de tentar utilizá-los.

## Como ler este arquivo

Primeiro leia o código completo sem alterar nada. Depois acompanhe o roteiro abaixo, localizando cada parte no código. Os nomes citados são os identificadores e seletores usados nesta implementação.

## Explicação passo a passo

1. initialData: contém os registros de demonstração separados em despesas, entradas, investimentos e metas.
2. loadData e saveData: recuperam e gravam os dados na chave minhasFinancas do localStorage.
3. Funções auxiliares: formatam valores monetários e datas, somam propriedades e escapam caracteres HTML.
4. renderSummary: calcula os totais e atualiza os cartões do Dashboard.
5. renderExpenses e renderIncomes: filtram e desenham listas de despesas e entradas.
6. renderInvestments: calcula diferença e percentual entre valor aplicado e valor atual.
7. renderGoals: calcula progresso de cada meta e atualiza a barra correspondente.
8. renderRecent: combina despesas e entradas para mostrar as transações recentes.
9. renderCharts: utiliza Chart.js para montar os gráficos mensal e por categoria.
10. renderAll: chama as funções de renderização; verificações de existência permitem compartilhar o arquivo entre páginas.
11. removeRecord: confirma e exclui um registro, salva e atualiza a interface.
12. connectForm: conecta os formulários, impede recarregamento, cria o objeto, salva e atualiza.
13. Eventos finais: conectam busca, filtro, botão de menu, limpeza de dados e inicialização da tela.

## Código-fonte integral

O bloco abaixo reproduz o conteúdo completo do arquivo que está no repositório no momento da documentação. O código foi preservado integralmente para você poder acompanhar linha por linha e copiar o arquivo, se necessário.

```javascript
/* =========================================================
   MINHAS FINANÇAS — JavaScript
   Nesta etapa os dados ficam no navegador (localStorage).
   Isto é apenas uma simulação de front-end; depois PHP/MySQL
   substituirão o armazenamento local.
   ========================================================= */
const initialData = {
    expenses: [
        {id:1,name:"Jantar com amigos",value:180,date:"2026-11-05",category:"Alimentação",payment:"Cartão de Crédito",description:""},
        {id:2,name:"Combustível",value:280,date:"2026-11-04",category:"Transporte",payment:"Cartão de Débito",description:""},
        {id:3,name:"Supermercado",value:650,date:"2026-11-03",category:"Alimentação",payment:"PIX",description:""},
        {id:4,name:"Aluguel",value:2000,date:"2026-11-01",category:"Moradia",payment:"Transferência",description:""},
        {id:5,name:"Netflix e Spotify",value:120,date:"2026-11-01",category:"Lazer",payment:"Cartão de Crédito",description:""},
        {id:6,name:"Plano de saúde",value:350,date:"2026-10-30",category:"Saúde",payment:"PIX",description:""},
        {id:7,name:"Roupas novas",value:450,date:"2026-10-28",category:"Outros",payment:"Cartão de Crédito",description:""}
    ],
    incomes: [
        {id:11,name:"Projeto de design",value:2200,date:"2026-11-05",payment:"PIX"},
        {id:12,name:"Salário mensal",value:5500,date:"2026-11-01",payment:"Transferência"},
        {id:13,name:"Salário mensal",value:5500,date:"2026-10-01",payment:"Transferência"}
    ],
    investments: [
        {id:21,name:"PETR4",type:"Ações",applied:5750,current:5750,date:"2026-11-01"},
        {id:22,name:"IVVB11",type:"ETF",applied:4500,current:4500,date:"2026-10-15"},
        {id:23,name:"Bitcoin",type:"Criptomoedas",applied:4200,current:3000,date:"2026-10-10"},
        {id:24,name:"Tesouro Selic",type:"Renda fixa",applied:10850,current:10935,date:"2026-09-01"}
    ],
    goals: [
        {id:31,name:"Viagem para Europa",target:50000,saved:8500,icon:"✈️"},
        {id:32,name:"Reserva de Emergência",target:30000,saved:22000,icon:"📍"},
        {id:33,name:"MacBook Pro",target:12000,saved:4800,icon:"💻"}
    ]
};
let data = loadData();
let monthlyChart = null;
let categoryChart = null;

function loadData() {
    const saved = localStorage.getItem("minhasFinancas");
    return saved ? JSON.parse(saved) : JSON.parse(JSON.stringify(initialData));
}
function saveData() { localStorage.setItem("minhasFinancas", JSON.stringify(data)); }
function money(value) {
    return Number(value || 0).toLocaleString("pt-BR", {style:"currency",currency:"BRL"});
}
function total(items, field="value") { return items.reduce((sum,item) => sum + Number(item[field] || 0), 0); }
function dateLabel(value) {
    if (!value) return "";
    const parts = value.split("-");
    return parts.length === 3 ? parts[2] + "/" + parts[1] + "/" + parts[0] : value;
}
function escapeHTML(value) {
    return String(value).replace(/[&<>"']/g, char => ({"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#039;"}[char]));
}


function renderSummary() {
    const income = total(data.incomes);
    const expense = total(data.expenses);
    if (document.getElementById("balanceTotal")) document.getElementById("balanceTotal").textContent = money(income - expense);
    if (document.getElementById("incomeTotal")) document.getElementById("incomeTotal").textContent = money(income);
    if (document.getElementById("expenseTotal")) document.getElementById("expenseTotal").textContent = money(expense);
    if (document.getElementById("investedTotal")) document.getElementById("investedTotal").textContent = money(total(data.investments,"applied"));
    if (document.getElementById("savedTotal")) document.getElementById("savedTotal").textContent = money(total(data.goals,"saved"));
    if (document.getElementById("expenseSubtitle")) document.getElementById("expenseSubtitle").textContent = "Total: " + money(expense);
    if (document.getElementById("incomeSubtitle")) document.getElementById("incomeSubtitle").textContent = "Total: " + money(income);
    if (document.getElementById("investmentSubtitle")) document.getElementById("investmentSubtitle").textContent = "Valor aplicado: " + money(total(data.investments,"applied"));
    if (document.getElementById("goalSubtitle")) document.getElementById("goalSubtitle").textContent = "Total guardado: " + money(total(data.goals,"saved"));
}
function renderExpenses() {
    const target = document.getElementById("expenseList");
    if (!target) return;
    const query = (document.getElementById("expenseSearch")?.value || "").toLowerCase();
    const category = document.getElementById("expenseCategoryFilter")?.value || "";
    const list = data.expenses.filter(item => item.name.toLowerCase().includes(query) && (!category || item.category === category));
    target.innerHTML = list.length ? list.map(item => `
        <div class="record-row"><div class="record-main"><p class="record-title">${escapeHTML(item.name)}</p><p class="record-meta">${escapeHTML(item.category)} • ${dateLabel(item.date)} • ${escapeHTML(item.payment)}</p></div><strong class="record-value negative">- ${money(item.value)}</strong><div class="row-actions"><button aria-label="Excluir despesa" onclick="removeRecord('expenses',${item.id})"><i class="bi bi-trash"></i></button></div></div>`).join("") : '<div class="empty-state">Nenhuma despesa encontrada.</div>';
}
function renderIncomes() {
    const target = document.getElementById("incomeList");
    if (!target) return;
    const query = (document.getElementById("incomeSearch")?.value || "").toLowerCase();
    const list = data.incomes.filter(item => item.name.toLowerCase().includes(query));
    target.innerHTML = list.length ? list.map(item => `
        <div class="record-row"><div class="record-main"><p class="record-title">${escapeHTML(item.name)}</p><p class="record-meta">${dateLabel(item.date)} • ${escapeHTML(item.payment)}</p></div><strong class="record-value positive">+ ${money(item.value)}</strong><div class="row-actions"><button aria-label="Excluir entrada" onclick="removeRecord('incomes',${item.id})"><i class="bi bi-trash"></i></button></div></div>`).join("") : '<div class="empty-state">Nenhuma entrada encontrada.</div>';
}
function renderInvestments() {
    const target = document.getElementById("investmentList");
    if (!target) return;
    target.innerHTML = data.investments.length ? data.investments.map(item => {
        const result = Number(item.current) - Number(item.applied);
        const percent = item.applied ? (result / item.applied * 100) : 0;
        return `<article class="investment-card"><div class="card-topline"><span>${escapeHTML(item.type)}</span><button class="row-actions" aria-label="Excluir investimento" onclick="removeRecord('investments',${item.id})"><i class="bi bi-trash"></i></button></div><h3>${escapeHTML(item.name)}</h3><div class="card-amount">${money(item.current)}</div><div class="card-sub">Investido: ${money(item.applied)}</div><div class="card-sub ${result >= 0 ? "positive" : "negative"}">Resultado: ${result >= 0 ? "+" : ""}${money(result)} (${percent.toFixed(1)}%)</div><div class="card-sub">${dateLabel(item.date)}</div></article>`;
    }).join("") : '<div class="empty-state">Nenhum investimento cadastrado.</div>';
}
function renderGoals() {
    const target = document.getElementById("goalList");
    if (!target) return;
    target.innerHTML = data.goals.length ? data.goals.map(item => {
        const percent = item.target ? Math.min(100, Number(item.saved) / Number(item.target) * 100) : 0;
        return `<article class="goal-card"><div class="card-topline"><span>${escapeHTML(item.icon || "🎯")} Meta financeira</span><button class="row-actions" aria-label="Excluir meta" onclick="removeRecord('goals',${item.id})"><i class="bi bi-trash"></i></button></div><h3>${escapeHTML(item.name)}</h3><div class="card-amount">${money(item.saved)}</div><div class="card-sub">Meta: ${money(item.target)}</div><div class="progress"><div class="progress-bar" style="width:${percent}%"></div></div><div class="goal-percent">${percent.toFixed(0)}% concluído</div></article>`;
    }).join("") : '<div class="empty-state">Nenhuma meta cadastrada.</div>';
}
function renderRecent() {
    const all = [
        ...data.expenses.map(item => ({...item,kind:"expense"})),
        ...data.incomes.map(item => ({...item,kind:"income"}))
    ].sort((a,b) => b.date.localeCompare(a.date)).slice(0,5);
    const target = document.getElementById("recentTransactions");
    if (!target) return;
    target.innerHTML = all.length ? all.map(item => `
        <div class="transaction-row"><div class="record-main"><p class="record-title">${escapeHTML(item.name)}</p><p class="record-meta">${dateLabel(item.date)}</p></div><strong class="record-value ${item.kind === "income" ? "positive" : "negative"}">${item.kind === "income" ? "+" : "-"} ${money(item.value)}</strong></div>`).join("") : '<div class="empty-state">Ainda não há transações.</div>';
}
function renderCharts() {
    if (typeof Chart === "undefined" || !document.getElementById("monthlyChart") || !document.getElementById("categoryChart")) return;
    const monthly = {};
    [...data.incomes.map(x => ({...x,kind:"income"})),...data.expenses.map(x => ({...x,kind:"expense"}))].forEach(item => {
        const key = item.date.slice(0,7);
        if (!monthly[key]) monthly[key] = {income:0,expense:0};
        monthly[key][item.kind] += Number(item.value);
    });
    const keys = Object.keys(monthly).sort().slice(-6);
    const labels = keys.map(key => key.split("-").reverse().join("/"));
    const ctx1 = document.getElementById("monthlyChart").getContext("2d");
    if (monthlyChart) monthlyChart.destroy();
    monthlyChart = new Chart(ctx1,{type:"bar",data:{labels,datasets:[
        {label:"Entradas",data:keys.map(k=>monthly[k].income),backgroundColor:"#08b981"},
        {label:"Gastos",data:keys.map(k=>monthly[k].expense),backgroundColor:"#f04452"}
    ]},options:{responsive:true,maintainAspectRatio:false,legend:{labels:{fontColor:"#aeb9c9",fontSize:10}},scales:{xAxes:[{ticks:{fontColor:"#8290a5"},gridLines:{color:"#1c2a3d"}}],yAxes:[{ticks:{fontColor:"#8290a5",beginAtZero:true},gridLines:{color:"#1c2a3d"}}]}}});
    const categories = {};
    data.expenses.forEach(item => categories[item.category] = (categories[item.category] || 0) + Number(item.value));
    const ctx2 = document.getElementById("categoryChart").getContext("2d");
    if (categoryChart) categoryChart.destroy();
    categoryChart = new Chart(ctx2,{type:"doughnut",data:{labels:Object.keys(categories),datasets:[{data:Object.values(categories),backgroundColor:["#a13cf0","#08b981","#f04452","#3478f6","#f5b942","#16a6b6"],borderWidth:0}]},options:{responsive:true,maintainAspectRatio:false,legend:{position:"bottom",labels:{fontColor:"#aeb9c9",fontSize:9,padding:12}}}});
}
function renderAll() {
    renderSummary(); renderExpenses(); renderIncomes(); renderInvestments(); renderGoals(); renderRecent(); renderCharts();
}
function removeRecord(collection,id) {
    if (!confirm("Deseja realmente excluir este registro?")) return;
    data[collection] = data[collection].filter(item => item.id !== id);
    saveData(); renderAll();
}
window.removeRecord = removeRecord;

function connectForm(formId, collection, buildItem, modalId) {
    const form = document.getElementById(formId);
    if (!form) return;
    form.addEventListener("submit", event => {
        event.preventDefault();
        data[collection].unshift(buildItem());
        saveData(); renderAll();
        $("#" + modalId).modal("hide");
        event.target.reset();
    });
}
connectForm("expenseForm","expenses",() => ({
    id:Date.now(),name:document.getElementById("expenseName").value.trim(),
    value:Number(document.getElementById("expenseValue").value),date:document.getElementById("expenseDate").value,
    category:document.getElementById("expenseCategory").value,payment:document.getElementById("expensePayment").value,
    description:document.getElementById("expenseDescription").value.trim()
}),"expenseModal");
connectForm("incomeForm","incomes",() => ({
    id:Date.now(),name:document.getElementById("incomeName").value.trim(),
    value:Number(document.getElementById("incomeValue").value),date:document.getElementById("incomeDate").value,
    payment:document.getElementById("incomePayment").value
}),"incomeModal");
connectForm("investmentForm","investments",() => ({
    id:Date.now(),name:document.getElementById("investmentName").value.trim(),
    type:document.getElementById("investmentType").value,applied:Number(document.getElementById("investmentApplied").value),
    current:Number(document.getElementById("investmentCurrent").value),date:document.getElementById("investmentDate").value
}),"investmentModal");
connectForm("goalForm","goals",() => ({
    id:Date.now(),name:document.getElementById("goalName").value.trim(),
    target:Number(document.getElementById("goalTarget").value),saved:Number(document.getElementById("goalSaved").value),
    icon:"🎯"
}),"goalModal");

const expenseSearch = document.getElementById("expenseSearch");
if (expenseSearch) expenseSearch.addEventListener("input", renderExpenses);
const expenseCategoryFilter = document.getElementById("expenseCategoryFilter");
if (expenseCategoryFilter) expenseCategoryFilter.addEventListener("change", renderExpenses);
const incomeSearch = document.getElementById("incomeSearch");
if (incomeSearch) incomeSearch.addEventListener("input", renderIncomes);

const menuToggle = document.getElementById("menuToggle");
if (menuToggle) menuToggle.addEventListener("click", () => document.getElementById("sidebar").classList.toggle("open"));

const clearData = document.getElementById("clearData");
if (clearData) clearData.addEventListener("click", event => {
    event.preventDefault();
    if (confirm("Isso apaga os registros salvos neste navegador e restaura os exemplos. Continuar?")) {
        localStorage.removeItem("minhasFinancas");
        data = JSON.parse(JSON.stringify(initialData));
        renderAll();
    }
});

const todayLabel = document.getElementById("todayLabel");
if (todayLabel) todayLabel.textContent = new Date().toLocaleDateString("pt-BR", {day:"2-digit",month:"short",year:"numeric"});

["expenseDate","incomeDate","investmentDate"].forEach(id => {
    const field = document.getElementById(id);
    if (field) field.value = new Date().toISOString().slice(0,10);
});

renderAll();

```

## Prática

1. Abra o arquivo original no Visual Studio Code.
2. Abra este documento ao lado dele.
3. Leia o código em blocos, seguindo a explicação acima.
4. Para cada tag, classe, ID, propriedade ou função que encontrar, tente explicar em voz alta para que serve.
5. Faça uma pequena alteração de teste, veja o resultado no navegador e depois decida se deseja mantê-la.

## Explicação detalhada das partes do JavaScript

### Bloco 1 — dados iniciais (`initialData`)
O objeto reúne quatro arrays: despesas, entradas, investimentos e metas. Um array é uma lista de itens; cada item é um objeto com propriedades como identificador, nome, valor e data. Esses registros iniciais servem como demonstração quando o navegador ainda não tem dados salvos.

### Bloco 2 — estado da aplicação
A variável `data` guarda os dados que estão sendo utilizados. Ela é declarada com `let` porque pode receber um novo objeto quando os dados são carregados ou restaurados. Variáveis que começam como `null` reservam espaço para as instâncias dos gráficos do Chart.js.

### Bloco 3 — carregamento e salvamento (`loadData` e `saveData`)
`localStorage.getItem()` tenta recuperar o conteúdo associado a uma chave. Como o localStorage guarda texto, `JSON.parse()` transforma o texto JSON novamente em objeto JavaScript. Quando não existe dado salvo, o script prepara os dados de demonstração. `JSON.stringify()` converte o objeto em texto e `localStorage.setItem()` grava esse texto no navegador. Os dados ficam naquele navegador e dispositivo; não são enviados a um servidor.

### Bloco 4 — funções auxiliares de formatação
A função de moeda transforma números em uma apresentação brasileira, com símbolo R$ e separadores adequados. A função de total percorre uma lista e soma uma propriedade específica. A função de data separa ano, mês e dia para apresentar a data no formato utilizado na interface. A função de escape substitui caracteres especiais por entidades HTML antes de inserir textos digitados pelo usuário no conteúdo da página.

### Bloco 5 — atualização dos indicadores (`renderSummary`)
A função soma entradas, despesas, investimentos e valores guardados. Em seguida localiza os elementos pelos IDs definidos no HTML e atualiza o texto. As verificações de existência são importantes porque o mesmo arquivo JavaScript é carregado em páginas diferentes: um cartão que existe no Dashboard pode não existir na tela de Gastos.

### Bloco 6 — lista de despesas (`renderExpenses`)
Primeiro a função verifica se o contêiner da lista existe. Depois lê o texto de pesquisa e a categoria selecionada. A lista é filtrada para manter apenas os registros compatíveis. Os resultados são transformados em marcação HTML e inseridos no contêiner. Os valores passam pela função de moeda; as datas são formatadas; textos são escapados; e cada botão de exclusão recebe o identificador do registro correspondente.

### Bloco 7 — lista de entradas (`renderIncomes`)
A lógica é semelhante à lista de despesas, mas consulta o array de entradas. A pesquisa compara o texto informado com a descrição/nome dos registros. A renderização monta as linhas e identifica visualmente valores recebidos como positivos. Se não houver correspondências, é apresentada uma mensagem apropriada.

### Bloco 8 — cartões de investimentos (`renderInvestments`)
Para cada investimento, o script compara o valor atual com o valor aplicado. A diferença é o resultado financeiro. O percentual é calculado dividindo a diferença pelo valor aplicado e multiplicando por 100. É necessário tratar o caso de valor aplicado igual a zero para evitar divisão por zero. O resultado é usado para escolher a classe visual positiva ou negativa.

### Bloco 9 — cartões de metas (`renderGoals`)
Para cada meta, o percentual é calculado por valor guardado dividido pelo valor desejado, multiplicado por 100. A função limita o resultado a 100% para que a barra não ultrapasse seu espaço. O cartão mostra nome, valores e progresso. A largura da barra é atualizada com o percentual calculado.

### Bloco 10 — transações recentes (`renderRecent`)
A função combina registros de despesas e entradas em uma lista temporária. Cada registro recebe uma identificação de tipo para distinguir saída de dinheiro e recebimento. A lista é ordenada pela data e limitada aos itens mais recentes antes de ser exibida no Dashboard.

### Bloco 11 — gráficos (`renderCharts`)
Chart.js precisa encontrar os elementos canvas no HTML. O script verifica se a biblioteca e os canvas estão disponíveis. Os dados são agrupados para formar o gráfico mensal e o gráfico por categoria. Se um gráfico já existir, sua instância anterior é destruída antes de criar outra, evitando sobreposição de desenhos.

### Bloco 12 — atualização geral (`renderAll`)
Essa função central chama as funções responsáveis por atualizar os indicadores, listas, cartões e gráficos. Após cadastrar ou excluir um registro, chamar `renderAll()` mantém a interface sincronizada com os dados que estão na variável `data`.

### Bloco 13 — exclusão de registros (`removeRecord`)
A função recebe o nome do array e o identificador do item. Uma confirmação é exibida antes de apagar. O método `filter()` cria uma nova lista mantendo os registros cujo ID não corresponde ao item escolhido. Depois o script salva e atualiza a interface.

### Bloco 14 — conexão dos formulários (`connectForm`)
A função recebe informações para trabalhar com diferentes formulários sem repetir toda a lógica. Ela verifica se o formulário existe; registra um ouvinte para o evento `submit`; usa `preventDefault()` para evitar o recarregamento tradicional; lê os campos; cria o objeto; adiciona o item ao array; salva; atualiza a interface; fecha o modal e limpa o formulário. Os IDs dos campos precisam coincidir com os IDs presentes nos HTMLs.

### Bloco 15 — configuração dos quatro cadastros
As chamadas da função de conexão informam como construir cada tipo de registro. Despesa, entrada, investimento e meta possuem campos diferentes, por isso cada cadastro monta seu próprio objeto. `Number()` converte valores digitados para número; `trim()` remove espaços no começo e no fim de textos; um identificador é criado para que cada registro possa ser localizado e excluído.

### Bloco 16 — pesquisa, filtros e eventos
O JavaScript procura os campos de pesquisa e filtro pelo ID. Quando o elemento existe, registra um ouvinte de evento. `input` ocorre durante a digitação; `change` ocorre quando o valor de um seletor muda; `click` ocorre ao clicar em um botão. Cada evento chama a função responsável por atualizar a parte da tela afetada.

### Bloco 17 — menu lateral responsivo
O botão de menu recebe um ouvinte de clique. `classList.toggle("open")` alterna a classe `open`: se ela não existe, adiciona; se existe, remove. O CSS utiliza essa classe para mostrar ou esconder a sidebar no celular.

### Bloco 18 — restauração dos dados
O controle de limpar dados pede confirmação. Se o usuário confirmar, a chave do localStorage é removida e os dados iniciais são carregados novamente. Isso afeta os dados armazenados naquele navegador, não altera dados em servidor.

### Bloco 19 — data atual e inicialização
O script preenche o elemento de data com a data atual. Também configura campos de data para iniciarem com o dia atual quando aplicável. No final, a chamada de renderização inicial faz os dados aparecerem assim que a página termina de carregar.

### Conceitos importantes usados no arquivo
- **Variável:** espaço nomeado que guarda um valor.
- **Array:** lista de registros.
- **Objeto:** conjunto de propriedades de um registro.
- **Função:** bloco reutilizável de instruções.
- **Parâmetro:** informação recebida pela função.
- **Evento:** ação que dispara uma função, como clique ou envio.
- **DOM:** representação dos elementos HTML que o JavaScript pode consultar e alterar.
- **JSON:** formato de texto usado para armazenar e recuperar objetos.
- **localStorage:** armazenamento no navegador.
- **filter:** cria uma lista apenas com os itens que passam por uma condição.
- **map:** transforma cada item de uma lista.
- **reduce:** percorre uma lista acumulando um resultado, como uma soma.

