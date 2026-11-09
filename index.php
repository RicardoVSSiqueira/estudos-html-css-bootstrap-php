<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Finanças | Painel</title>

    <!-- Bootstrap 4.6.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Ícones Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS do projeto -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="layout">
    <aside class="sidebar">
        <a href="index.php" class="brand">
            <i class="bi bi-wallet2"></i>
            <span>Minhas Finanças</span>
        </a>

        <p class="menu-titulo">MENU</p>

        <nav class="menu">
            <a href="index.php" class="menu-link ativo">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="#" class="menu-link">
                <i class="bi bi-cash-coin"></i> Gastos
            </a>
            <a href="#" class="menu-link">
                <i class="bi bi-graph-up-arrow"></i> Investimentos
            </a>
            <a href="#" class="menu-link">
                <i class="bi bi-wallet"></i> Entradas
            </a>
            <a href="#" class="menu-link">
                <i class="bi bi-bullseye"></i> Objetivos
            </a>
        </nav>

        <a href="#" class="menu-link sair">
            <i class="bi bi-box-arrow-left"></i> Sair
        </a>
    </aside>

    <main class="conteudo">
        <header class="topo">
            <div>
                <p class="saudacao">VISÃO GERAL DAS SUAS FINANÇAS</p>
                <h1>Dashboard</h1>
            </div>
            <div class="usuario">
                <i class="bi bi-person-circle"></i>
                <span>Minha conta</span>
            </div>
        </header>

        <section class="resumo">
            <article class="card-resumo">
                <div class="card-resumo-topo">
                    <span>Saldo atual</span>
                    <i class="bi bi-wallet2 icone-verde"></i>
                </div>
                <h2>R$ 10.990,00</h2>
                <small>Saldo disponível</small>
            </article>

            <article class="card-resumo">
                <div class="card-resumo-topo">
                    <span>Entradas</span>
                    <i class="bi bi-arrow-down-circle icone-verde"></i>
                </div>
                <h2>R$ 19.200,00</h2>
                <small>Total recebido</small>
            </article>

            <article class="card-resumo">
                <div class="card-resumo-topo">
                    <span>Gastos</span>
                    <i class="bi bi-arrow-up-circle icone-vermelho"></i>
                </div>
                <h2>R$ 8.210,00</h2>
                <small>Total de despesas</small>
            </article>

            <article class="card-resumo">
                <div class="card-resumo-topo">
                    <span>Investido</span>
                    <i class="bi bi-graph-up icone-azul"></i>
                </div>
                <h2>R$ 25.300,00</h2>
                <small>Patrimônio investido</small>
            </article>

            <article class="card-resumo">
                <div class="card-resumo-topo">
                    <span>Guardado</span>
                    <i class="bi bi-piggy-bank icone-roxo"></i>
                </div>
                <h2>R$ 35.300,00</h2>
                <small>Total reservado</small>
            </article>
        </section>

        <section class="painel-graficos">
            <article class="painel">
                <h3>Entradas e Gastos Mensais</h3>
                <div class="grafico-barras">
                    <div class="barra-grupo">
                        <div class="barras">
                            <span class="barra entrada" style="height: 130px"></span>
                            <span class="barra gasto" style="height: 65px"></span>
                        </div>
                        <small>Jan</small>
                    </div>
                    <div class="barra-grupo">
                        <div class="barras">
                            <span class="barra entrada" style="height: 105px"></span>
                            <span class="barra gasto" style="height: 55px"></span>
                        </div>
                        <small>Fev</small>
                    </div>
                    <div class="barra-grupo">
                        <div class="barras">
                            <span class="barra entrada" style="height: 145px"></span>
                            <span class="barra gasto" style="height: 75px"></span>
                        </div>
                        <small>Mar</small>
                    </div>
                    <div class="barra-grupo">
                        <div class="barras">
                            <span class="barra entrada" style="height: 115px"></span>
                            <span class="barra gasto" style="height: 60px"></span>
                        </div>
                        <small>Abr</small>
                    </div>
                </div>
                <div class="legenda">
                    <span><i class="ponto entrada"></i> Entradas</span>
                    <span><i class="ponto gasto"></i> Gastos</span>
                </div>
            </article>

            <article class="painel">
                <h3>Gastos por Categoria</h3>
                <div class="grafico-categorias">
                    <div class="grafico-rosca"></div>
                    <div class="legenda-categorias">
                        <span><i class="ponto categoria-1"></i> Alimentação</span>
                        <span><i class="ponto categoria-2"></i> Transporte</span>
                        <span><i class="ponto categoria-3"></i> Moradia</span>
                        <span><i class="ponto categoria-4"></i> Outros</span>
                    </div>
                </div>
            </article>
        </section>

        <section class="painel transacoes">
            <h3>Transações Recentes</h3>
            <div class="transacao">
                <div><strong>Jantar com amigos</strong><small>Alimentação · 06/11/2026</small></div>
                <b class="valor-negativo">- R$ 150,00</b>
            </div>
            <div class="transacao">
                <div><strong>Combustível</strong><small>Transporte · 05/11/2026</small></div>
                <b class="valor-negativo">- R$ 250,00</b>
            </div>
            <div class="transacao">
                <div><strong>Salário mensal</strong><small>Entrada · 01/11/2026</small></div>
                <b class="valor-positivo">+ R$ 5.200,00</b>
            </div>
        </section>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
