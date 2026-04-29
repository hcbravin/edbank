<!-- <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <?php alert('Serviço indisponível no momento!'); ?>
    </div>
</div> -->

<div class="row justify-content-center">

    <!-- Meus emprestimos -->
     <div class="col-12 col-sm-10 col-md-8 mb-5">
        <div class="infomain bd-1 bd-primary shadow-md mb-2">
            <i class="bi bi-calculator me-1"></i> Meus Empréstimos
        </div>

        <ul class="list-group shadow-md">
            <li class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">

                </div>
            </li>
            <li class="list-group-item list-group-item-action"></li>
            <li class="list-group-item list-group-item-action"></li>
            <li class="list-group-item list-group-item-action"></li>
        </ul>
     </div>

    <!-- Banner -->
    <div class="col-12 col-sm-10 col-md-8 mb-2 text-center">
        <img src="/images/banner_emprestimo_page_smartphone.png" alt="Novo Emprestimo" class="d-sm-none w-100" loading="lazy">
        <img src="/images/banner_emprestimo_page_widescreen.png" alt="Novo Emprestimo" class="d-none d-sm-block w-100" loading="lazy">
    </div>


    <!-- Realize um novo empréstimo -->
    <div class="col-12 col-sm-10 col-md-8">

        <!-- Card Principal do Formulário -->
        <div class="card shadow-md mb-4">
            <div class="card-header bg-primary text-white">
                <i class="bi bi-calculator me-2"></i>
                Simulador de Empréstimo Pessoal
            </div>
            <div class="card-body p-4">
                <div class="row">
                    
                    <!-- Valor do Empréstimo -->
                    <div class="col-12 mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-cash-coin me-2 text-primary"></i>
                            Quanto você precisa?
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light">R$</span>
                            <input type="number" class="form-control" id="valorEmprestimo" value="5000" min="1000" max="50000" step="500" onchange="atualizarSimulacao()">
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <small class="text-muted">Mínimo: R$ 1.000</small>
                            <small class="text-muted">Máximo: R$ <?= number_format($EmpMax, 0, ',', '.'); ?></small>
                        </div>

                        <!-- Slider -->
                        <input type="range" class="form-range mt-2" id="valorSlider" min="1000" max="<?= $EmpMax; ?>" step="500" value="5000" oninput="sincronizarValor(this.value)">
                    </div>

                    <!-- Prazo -->
                    <div class="col-12 col-sm-6 mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-calendar-week me-2 text-primary"></i>
                            Prazo para pagar
                        </label>
                        <select class="form-select form-select-lg" id="prazoEmprestimo" onchange="atualizarSimulacao()">
                            <option value="6">6 meses (0,5 anos)</option>
                            <option value="12" selected>12 meses (1 ano)</option>
                            <option value="18">18 meses (1,5 anos)</option>
                            <option value="24">24 meses (2 anos)</option>
                            <option value="36">36 meses (3 anos)</option>
                            <option value="48">48 meses (4 anos)</option>
                            <option value="60">60 meses (5 anos)</option>
                        </select>
                    </div>


                    <!-- Opções adicionais (pegadinhas) -->
                    <div class="col-12 col-sm-6 mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-shield-plus me-2 text-primary"></i>
                            Produtos Opcionais
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="tarifaCadastro" checked onchange="atualizarSimulacao()">
                            <label class="form-check-label" for="tarifaCadastro">
                                <span class="text-danger">⚠</span> Tarifa de Cadastro
                                <small class="text-muted d-block">Consiste em 0,5% do valor do contrato. O parcelamento da Tarifa pode ser feito anexando seu valor ao próprio contrato. Caso não seja parcelada a sua tarifa irá ser debitada em conta.</small>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Resultado da Simulação -->
        <div class="card shadow-md mb-4" id="resultadoCard">
            <div class="card-header bg-success text-white">
                <i class="bi bi-graph-up me-2"></i>
                Resultado da Simulação
            </div>
            <div class="card-body">
                <!-- Taxa de Juros (com pegadinha) -->
                <div class="row align-items-center mb-4">
                    <div class="col-8">
                        <span class="text-muted">Taxa de Juros:</span>
                    </div>
                    <div class="col-4 text-end">
                        <span class="badge bg-info fs-6" id="taxaJuros">2,5% a.m.</span>
                    </div>
                    <div class="col-12">
                        <small class="text-danger" id="taxaAnual">(equivalente a 34,5% a.a.)</small>
                    </div>
                </div>

                <!-- CET (Custo Efetivo Total) - Importante mostrar -->
                <div class="row align-items-center mb-4 bg-light p-3 rounded">
                    <div class="col-8">
                        <span class="fw-bold">CET (Custo Efetivo Total):</span>
                        <small class="text-muted d-block">com todas as taxas inclusas</small>
                    </div>
                    <div class="col-4 text-end">
                        <span class="h5 text-warning mb-0" id="cet">3,2% a.m.</span>
                    </div>
                </div>

                <!-- Valores principais -->
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="card text-center border-primary">
                            <div class="card-body p-3">
                                <small class="text-muted">Valor das Parcelas</small>
                                <h4 class="text-primary mb-0" id="valorParcela">R$ 483,32</h4>
                                <small class="text-muted" id="numeroParcelas">12 parcelas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card text-center border-success">
                            <div class="card-body p-3">
                                <small class="text-muted">Total a Pagar</small>
                                <h4 class="text-success mb-0" id="totalPagar">R$ 5.799,84</h4>
                                <small class="text-muted" id="totalJuros">Juros: R$ 799,84</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparação com valor solicitado -->
                <div class="progress mb-2" style="height: 8px;">
                    <div class="progress-bar bg-success" role="progressbar" id="progressoJuros" style="width: 16%;"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <small>Valor solicitado: <span id="valorSolicitado">R$ 5.000</span></small>
                    <small>Juros: <span id="jurosPercentual">16%</span></small>
                </div>

                <!-- Detalhamento mensal (collapse) -->
                <div class="mt-4">
                    <button class="btn btn-link text-decoration-none w-100" type="button" data-bs-toggle="collapse" data-bs-target="#tabelaParcelas">
                        <i class="bi bi-table me-2"></i>
                        Ver tabela de parcelas
                        <i class="bi bi-chevron-down ms-2"></i>
                    </button>

                    <div class="collapse mt-3" id="tabelaParcelas">
                        <div class="card card-body p-2">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Parcela</th>
                                            <th>Valor</th>
                                            <th>Amortização</th>
                                            <th>Juros</th>
                                            <th>Saldo Devedor</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaCorpo">
                                        <!-- JavaScript vai preencher -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alertas importantes (pegadinhas) -->
        <div class="mb-4">
            <div class="alert alert-warning border-warning">
                <div class="d-flex">
                    <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                    <div>
                        <h6 class="alert-heading">Importante ler antes de contratar:</h6>
                        <ul class="mb-0 small">
                            <li>Taxa de juros sujeita a alteração sem aviso prévio</li>
                            <li>O CET inclui todas as despesas da operação de crédito</li>
                            <li id="avisoTarifa">Tarifa de cadastro de R$ 100,00 incluída</li>
                            <li id="avisoSeguro" class="d-none">Seguro prestamista incluso (R$ 15,00/mês)</li>
                            <li>Em caso de atraso, multa de 2% + juros de mora de 1% a.m.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botões de Ação -->
        <div class="d-grid gap-2 mb-5">
            <button class="btn btn-success btn-lg" onclick="solicitarEmprestimo()">
                <i class="bi bi-check-circle me-2"></i>
                Solicitar Empréstimo
            </button>
            <button class="btn btn-outline-primary" onclick="recalcularSimulacao()">
                <i class="bi bi-arrow-repeat me-2"></i>
                Recalcular
            </button>
            <button class="btn btn-outline-secondary" onclick="imprimirSimulacao()">
                <i class="bi bi-printer me-2"></i>
                Imprimir Simulação
            </button>
        </div>

        <!-- Comparação com outras opções -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-arrow-left-right me-2"></i>
                    Compare com outras opções
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Opção</th>
                                <th>Taxa mês</th>
                                <th>Parcelas</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Esta simulação</td>
                                <td class="text-primary" id="compTaxa">2,5%</td>
                                <td id="compParcelas">12x R$ 483,32</td>
                                <td class="text-success" id="compTotal">R$ 5.799,84</td>
                            </tr>
                            <tr>
                                <td>Crédito Consignado</td>
                                <td class="text-success">1,8%</td>
                                <td>12x R$ 467,85</td>
                                <td class="text-success">R$ 5.614,20</td>
                            </tr>
                            <tr>
                                <td>Cheque Especial</td>
                                <td class="text-danger">8,5%</td>
                                <td>12x R$ 678,50</td>
                                <td class="text-danger">R$ 8.142,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Perguntas Frequentes -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-question-circle me-2"></i>
                    Perguntas Frequentes
                </h6>
            </div>
            <div class="card-body">
                <div class="accordion" id="faqEmprestimo">
                    <!-- Pergunta 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                O que é CET?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqEmprestimo">
                            <div class="accordion-body">
                                CET significa Custo Efetivo Total. É o valor que inclui não só os juros, mas também todas as taxas, impostos e despesas da operação de crédito. É o melhor indicador para comparar empréstimos.
                            </div>
                        </div>
                    </div>

                    <!-- Pergunta 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Posso quitar antecipadamente?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqEmprestimo">
                            <div class="accordion-body">
                                Sim! A quitação antecipada dá direito à redução proporcional dos juros. Porém, algumas instituições cobram multa de 3% sobre o saldo devedor (verifique no contrato).
                            </div>
                        </div>
                    </div>

                    <!-- Pergunta 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                O que acontece se eu atrasar?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqEmprestimo">
                            <div class="accordion-body">
                                Em caso de atraso, são cobrados: multa de 2% sobre o valor da parcela, juros de mora de 1% ao mês e correção monetária. Além disso, seu nome pode ser negativado após 90 dias.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aviso legal -->
        <div class="text-center mt-4 mb-4">
            <small class="text-muted">
                <i class="bi bi-info-circle me-1"></i>
                Esta é uma simulação educacional. Taxas e condições podem variar conforme análise de crédito.
            </small>
        </div>


        <!-- Modal de Confirmação -->
        <div class="modal fade" id="modalConfirmacao" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">
                            <i class="bi bi-check-circle me-2"></i>
                            Empréstimo Simulado
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center p-4">
                        <i class="bi bi-emoji-smile text-success display-1 mb-4"></i>
                        <h4>Simulação concluída!</h4>
                        <p class="text-muted mb-4">
                            Seus dados foram registrados para simulação. Em breve um consultor entrará em contato.
                        </p>
                        <div class="alert alert-info">
                            <strong>Protocolo:</strong> EMP<span id="protocoloNumero">20231215001</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Entendi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Elementos DOM
    const valorInput = document.getElementById('valorEmprestimo');
    const valorSlider = document.getElementById('valorSlider');
    const prazoSelect = document.getElementById('prazoEmprestimo');
    const seguroCheck = document.getElementById('seguroPrestamista');
    const tarifaCheck = document.getElementById('tarifaCadastro');
    const modalConfirmacao = new bootstrap.Modal(document.getElementById('modalConfirmacao'));

    // Taxas base por perfil
    const taxasPorPerfil = {
        novo: 0.032, // 3,2% a.m.
        regular: 0.028, // 2,8% a.m.
        premium: 0.025 // 2,5% a.m.
    };

    // Tarifas adicionais
    const TARIFA_CADASTRO = 100; // R$ 100,00
    const SEGURO_MENSAL = 15; // R$ 15,00 por mês

    // Atualizar valor pelo slider
    function sincronizarValor(valor) {
        valorInput.value = valor;
        atualizarSimulacao();
    }

    // Função principal de simulação
    function atualizarSimulacao() {
        const valor = parseFloat(valorInput.value) || 5000;
        const prazo = parseInt(prazoSelect.value) || 12;

        // Determinar taxa base
        let taxaBase = taxasPorPerfil.novo; // padrão
        if (document.getElementById('perfilRegular').checked) {
            taxaBase = taxasPorPerfil.regular;
        } else if (document.getElementById('perfilPremium').checked) {
            taxaBase = taxasPorPerfil.premium;
        }

        // Calcular CET (inclui taxas)
        let cet = taxaBase;

        // Calcular valor total com taxas adicionais
        let valorFinanciado = valor;
        let taxasExtras = 0;

        // Tarifa de cadastro (uma vez)
        if (tarifaCheck.checked) {
            valorFinanciado += TARIFA_CADASTRO;
            taxasExtras += TARIFA_CADASTRO;
            document.getElementById('avisoTarifa').style.display = 'block';
        } else {
            document.getElementById('avisoTarifa').style.display = 'none';
        }

        // Seguro prestamista (mensal)
        if (seguroCheck.checked) {
            // O seguro aumenta indiretamente o CET
            cet += 0.002; // +0,2% a.m. no CET
            document.getElementById('avisoSeguro').classList.remove('d-none');
        } else {
            document.getElementById('avisoSeguro').classList.add('d-none');
        }

        // Cálculo da parcela pelo sistema Price
        const taxaMensal = taxaBase;
        const parcela = calcularParcelaPrice(valorFinanciado, taxaMensal, prazo);
        const seguroMensal = seguroCheck.checked ? SEGURO_MENSAL : 0;
        const parcelaComSeguro = parcela + seguroMensal;

        // Valores totais
        const totalPagar = parcelaComSeguro * prazo;
        const totalJuros = totalPagar - valor;

        // Atualizar interface
        document.getElementById('taxaJuros').textContent = (taxaBase * 100).toFixed(2) + '% a.m.';

        // Taxa anual (pegadinha - juros compostos)
        const taxaAnual = (Math.pow(1 + taxaBase, 12) - 1) * 100;
        document.getElementById('taxaAnual').textContent = '(equivalente a ' + taxaAnual.toFixed(1) + '% a.a.)';

        document.getElementById('cet').textContent = (cet * 100).toFixed(2) + '% a.m.';
        document.getElementById('valorParcela').textContent = 'R$ ' + parcelaComSeguro.toFixed(2).replace('.', ',');
        document.getElementById('numeroParcelas').textContent = prazo + ' parcelas';
        document.getElementById('totalPagar').textContent = 'R$ ' + totalPagar.toFixed(2).replace('.', ',');
        document.getElementById('totalJuros').textContent = 'Juros: R$ ' + totalJuros.toFixed(2).replace('.', ',');
        document.getElementById('valorSolicitado').textContent = 'R$ ' + valor.toFixed(2).replace('.', ',');

        // Progresso de juros
        const percentualJuros = (totalJuros / valor) * 100;
        document.getElementById('progressoJuros').style.width = Math.min(percentualJuros, 100) + '%';
        document.getElementById('jurosPercentual').textContent = percentualJuros.toFixed(1) + '%';

        // Tabela de amortização
        gerarTabelaAmortizacao(valorFinanciado, taxaMensal, prazo, seguroMensal);

        // Atualizar comparação
        document.getElementById('compTaxa').textContent = (taxaBase * 100).toFixed(2) + '%';
        document.getElementById('compParcelas').textContent = prazo + 'x R$ ' + parcelaComSeguro.toFixed(2).replace('.', ',');
        document.getElementById('compTotal').textContent = 'R$ ' + totalPagar.toFixed(2).replace('.', ',');
    }

    // Cálculo de parcela Price
    function calcularParcelaPrice(valor, taxa, meses) {
        if (taxa === 0) return valor / meses;
        const fator = Math.pow(1 + taxa, meses);
        return valor * (taxa * fator) / (fator - 1);
    }

    // Gerar tabela de amortização
    function gerarTabelaAmortizacao(valor, taxa, meses, seguro) {
        const tabela = document.getElementById('tabelaCorpo');
        tabela.innerHTML = '';

        let saldoDevedor = valor;
        let amortizacaoConstante = valor / meses; // Sistema SAC para simplificar

        for (let i = 1; i <= meses; i++) {
            const juros = saldoDevedor * taxa;
            const amortizacao = amortizacaoConstante;
            const parcela = amortizacao + juros + seguro;
            saldoDevedor -= amortizacao;

            const row = tabela.insertRow();
            row.innerHTML = `
                    <td>${i}</td>
                    <td>R$ ${parcela.toFixed(2).replace('.', ',')}</td>
                    <td>R$ ${amortizacao.toFixed(2).replace('.', ',')}</td>
                    <td>R$ ${juros.toFixed(2).replace('.', ',')}</td>
                    <td>R$ ${Math.max(saldoDevedor, 0).toFixed(2).replace('.', ',')}</td>
                `;
        }
    }

    // Ações dos botões
    function solicitarEmprestimo() {
        const protocolo = 'EMP' + new Date().getTime().toString().slice(-8);
        document.getElementById('protocoloNumero').textContent = protocolo;
        modalConfirmacao.show();
    }

    function recalcularSimulacao() {
        atualizarSimulacao();
    }

    function imprimirSimulacao() {
        window.print();
    }

    function ajudaSimulacao() {
        alert('Esta simulação considera juros compostos, taxas e encargos.\n\nO CET (Custo Efetivo Total) é o melhor indicador para comparar empréstimos, pois inclui todas as despesas.');
    }

    // Inicializar
    document.addEventListener('DOMContentLoaded', function() {
        atualizarSimulacao();

        // Event listeners
        valorInput.addEventListener('change', function() {
            valorSlider.value = this.value;
            atualizarSimulacao();
        });
    });
</script>