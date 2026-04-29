<div class="row justify-content-center">
    <!-- Cabeçalho de Investimentos -->
    <div class="col-12 col-sm-10 col-md-8">
        <div class="infomain text-bg-primary p-4">
            <h1 class="fw-bold mb-3 text-shadow-sm">
                <i class="bi bi-graph-up-arrow me-2"></i>
                Multiplique seu Dinheiro Agora!
            </h1>
            <p class="lead mb-4">
                Investimentos exclusivos com <strong>retornos extraordinários</strong>.
                Oportunidades limitadas para clientes selecionados.
            </p>
            <div class="text-center text-sm-start">
                <span class="badge bg-success fs-6 mb-2 mb-sm-0">
                    <i class="bi bi-lightning-charge me-1"></i>
                    +<?= rand(90,99); ?>% de aprovação
                </span>
                <span class="badge bg-warning fs-6">
                    <i class="bi bi-star-fill me-1"></i>
                    Oportunidades únicas
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-10 col-md-8 mt-3">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">
                <i class="bi bi-gem text-warning me-2"></i>
                Ofertas Premium
            </h2>
            <p class="text-muted">Invista agora e garanta sua rentabilidade futura</p>
        </div>
    </div>
</div>

<!-- Ofertas em Destaque -->
<div class="row g-4 mb-5">
    <!-- Cofrinho -->
     <div class="col-lg-4">
        <div class="card border-0 shadow-lg h-100" style="border-top: 5px solid #28a745;">
            <div class="card-header bg-success text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Cofrinho</h5>
                    <span class="badge bg-light text-success">
                        <i class="bi bi-fire me-1"></i>
                        HOT
                    </span>
                </div>
            </div>
            <div class="card-body bgInvestimentosPig">
                <!-- Imagem -->
                <img src="/images/bg_investimentos_pig.png" width="100%"  alt="" class="mb-2">

                <!-- Taxa chamativa -->
                <div class="text-center mb-4">
                    <small class="text-muted">Rentabilidade Bruta</small>
                    <h1 class="display-4 fw-bold text-success my-0">120%</h1>
                    <small class="text-muted">do CDI a.m.</small>
                </div>

                <!-- Destaques (escondendo pegadinhas) -->
                <div class="row mb-3 d-none">
                    <div class="col-6">
                        <div class="text-center">
                            <i class="bi bi-calendar-x text-success fs-4 d-block mb-2"></i>
                            <small>Sem prazo</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <i class="bi bi-shield-check text-success fs-4 d-block mb-2"></i>
                            <small>Protegido</small>
                        </div>
                    </div>
                </div>

                <!-- Descrição otimista -->
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                    Liquidez diária
                </p>
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                    Sem taxas de administração*
                </p>

                <!-- Botão com urgência -->
                <div class="d-grid mt-4">
                    <button class="btn btn-success btn-lg ebInvModal" data-eb-tipo="1" data-eb-tempo="1" data-eb-color="success" data-bs-toggle="modal" data-bs-target="#invModalCofrinho">
                        <i class="bi bi-piggy-bank me-2"></i>
                        Criar Cofrinho
                    </button>
                </div>

                <!-- Letras miúdas -->
                <div class="mt-3">
                    <small class="text-muted">
                        *Não ocorre liquidez no final de semana. 
                        <span class="text-danger">IR regressivo aplicável.</span>
                        Rentabilidade não garantida pelo FGC.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <!-- CDB "Super Rentável" -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-lg h-100" style="border-top: 5px solid #28a745;">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">CDB Mega Rentável</h5>
                    <span class="badge bg-light text-primary">
                        <i class="bi bi-fire me-1"></i>
                        HOT
                    </span>
                </div>
            </div>
            <div class="card-body">
                <!-- Imagem -->
                <img src="/images/bg_investimentos_cdb.png" width="100%"  alt="" class="mb-2">

                <!-- Taxa chamativa -->
                <div class="text-center mb-4">
                    <small class="text-muted">Rentabilidade Bruta</small>
                    <h1 class="display-4 fw-bold text-primary mb-0">28%</h1>
                    <small class="text-muted">a.a.</small>
                </div>

                <!-- Destaques (escondendo pegadinhas) -->
                <div class="row mb-3 d-none">
                    <div class="col-6">
                        <div class="text-center">
                            <i class="bi bi-calendar-check text-primary fs-4 d-block mb-2"></i>
                            <small>24 meses</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <i class="bi bi-shield-check text-primary fs-4 d-block mb-2"></i>
                            <small>Protegido</small>
                        </div>
                    </div>
                </div>

                <!-- Descrição otimista -->
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-primary me-2"></i>
                    Garantia de rentabilidade acima do mercado
                </p>
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-primary me-2"></i>
                    Sem taxas de administração*
                </p>

                <!-- Botão com urgência -->
                <div class="d-grid mt-4">
                    <button class="btn btn-primary btn-lg ebInvModal" data-eb-tipo="2" data-eb-tempo="12" data-eb-color="primary" data-bs-toggle="modal" data-bs-target="#invModalCofrinho">
                        <i class="bi bi-bank me-2"></i>
                        Investir Agora
                    </button>
                </div>

                <!-- Letras miúdas -->
                <div class="mt-3">
                    <small class="text-muted">
                        *Rentabilidade bruta de 28% a.a. Liquidez diária após 720 dias.
                        <span class="text-danger">IR regressivo aplicável.</span>
                        Rentabilidade não garantida pelo FGC.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <!-- LCI "Isenta" -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-lg h-100" style="border-top: 5px solid #17a2b8;">
            <div class="card-header bg-info text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">LCI Isenta IR</h5>
                    <span class="badge bg-light text-info">
                        <i class="bi bi-star-fill me-1"></i>
                        TOP
                    </span>
                </div>
            </div>
            <div class="card-body">
                <!-- Imagem -->
                <img src="/images/bg_investimentos_lci.png" width="100%"  alt="" class="mb-2">

                <!-- Destaque da isenção -->
                <div class="text-center mb-4">
                    <small class="text-muted">Isento de Imposto de Renda</small>
                    <h1 class="display-4 fw-bold text-info mb-0">110%</h1>
                    <small class="text-muted">do CDI</small>
                </div>

                <!-- Destaques enganosos -->
                <div class="row mb-3 d-none">
                    <div class="col-6">
                        <div class="text-center">
                            <i class="bi bi-percent text-info fs-4 d-block mb-2"></i>
                            <small>Isenção IR</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <i class="bi bi-graph-up text-info fs-4 d-block mb-2"></i>
                            <small>Acima do CDI</small>
                        </div>
                    </div>
                </div>

                <!-- Benefícios destacados -->
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-info me-2"></i>
                    Rendimento 100% isento de Imposto de Renda
                </p>
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-info me-2"></i>
                    Garantia do FGC até R$ 250 mil
                </p>

                <!-- Botão atrativo -->
                <div class="d-grid mt-4">
                    <button class="btn btn-info btn-lg text-white ebInvModal" data-eb-tipo="3" data-eb-tempo="3" data-eb-color="info" data-bs-toggle="modal" data-bs-target="#invModalCofrinho">
                        <i class="bi bi-gem me-2"></i>
                        Garantir Vaga
                    </button>
                </div>

                <!-- Letras miúdas escondidas -->
                <div class="mt-3">
                    <small class="text-muted">
                        *Liquidez apenas após 90 dias. Rentabilidade de 110% do CDI apenas para
                        aplicações acima de R$ 50.000. Abaixo de R$ 50.000,00 a rentabilidade limita-se a 90% do CDI.
                        <span class="text-danger">Aplicação mínima de R$ 10.000.</span>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <!-- Criptomoedas --> 
    <div class="col-lg-4">
        <div class="card border-0 shadow-lg h-100" style="border-top: 5px solid #ffc107;">
            <div class="card-header bg-warning text-dark">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white">Criptomoedas</h5>
                    <span class="badge bg-light text-warning">
                        <i class="bi bi-airplane me-1"></i>
                        PLUS
                    </span>
                </div>
            </div>
            <div class="card-body">
                <!-- Imagem -->
                <img src="/images/bg_investimentos_cripto.png" width="100%"  alt="" class="mb-2">

                <!-- Taxa absurda -->
                <div class="text-center mb-4">
                    <small class="text-muted">Retorno de até</small>
                    <h1 class="display-4 fw-bold mb-0 text-warning">5000%</h1>
                    <small class="text-muted">em 120 meses</small>
                </div>

                <!-- Promessas irreais -->
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                    Sem risco de mercado*
                </p>
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                    Resgate a qualquer momento
                </p>

                <!-- Botão urgente -->
                <div class="d-grid mt-4">
                    <button class="btn btn-warning btn-lg ebInvModal" data-eb-tipo="4" data-eb-tempo="120" data-eb-color="warning" data-bs-toggle="modal" data-bs-target="#invModalCofrinho">
                        <i class="bi bi-coin me-2"></i>
                        Compre Agora
                    </button>
                </div>

                <!-- Pegadinhas escondidas -->
                <div class="mt-3">
                    <small class="text-muted">
                        *Garantia condicionada à variação de mercado. Taxa de administração de 10% do valor da venda.
                        <span class="text-warning">Carência de 360 dias para resgate.</span>
                        Performance passada não garante resultados futuros.
                    </small>
                </div>
            </div>
        </div>
    </div>
    <!-- Fundo "Garantido" -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-lg h-100" style="border-top: 5px solid #ffc107;">
            <div class="card-header bg-danger text-dark">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-white">Fundo Garantido Plus</h5>
                    <span class="badge bg-light text-danger">
                        <i class="bi bi-shield-fill me-1"></i>
                        SAFE
                    </span>
                </div>
            </div>
            <div class="card-body">
                <!-- Imagem -->
                <img src="/images/bg_investimentos_ultra.png" width="100%"  alt="" class="mb-2">

                <!-- Taxa absurda -->
                <div class="text-center mb-4">
                    <small class="text-muted">Retorno Garantido</small>
                    <h1 class="display-4 fw-bold text-danger mb-0">175%</h1>
                    <small class="text-muted">em 60 meses</small>
                </div>


                <!-- Promessas irreais -->
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                    Sem risco de mercado*
                </p>
                <p class="card-text">
                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                    Resgate a qualquer momento
                </p>

                <!-- Botão urgente -->
                <div class="d-grid mt-4">
                    <button class="btn btn-danger btn-lg ebInvModal"  data-eb-tipo="5" data-eb-tempo="60" data-eb-color="danger" data-bs-toggle="modal" data-bs-target="#invModalCofrinho">
                        <i class="bi bi-clock-fill me-2"></i>
                        Últimas Vagas
                    </button>
                </div>

                <!-- Pegadinhas escondidas -->
                <div class="mt-3">
                    <small class="text-muted">
                        *Garantia condicionada à rentabilidade do fundo. Taxa de administração de 3% a.a.
                        <span class="text-danger">Carência de 360 dias para resgate.</span>
                        Performance passada não garante resultados futuros.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contador de Oportunidades (Fake) -->
<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="card bg-dark text-white mb-5">
            <div class="card-body text-center">
                <h4 class="mb-3">
                    <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>
                    Oferta por Tempo Limitado!
                </h4>
                <div class="display-6 fw-bold mb-3" id="contador-investidores">
                    <span id="contador"><?= rand(50,200); ?></span> investidores nos últimos <?= rand(10,30); ?> minutos
                </div>
                <div class="progress mb-3" style="height: 10px;">
                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                        role="progressbar" style="width: 85%;"></div>
                </div>
                <small>Vagas estão acabando rapidamente!</small>
            </div>
        </div>
    </div>

    <!-- Testemunhos Falsos -->
    <div class="col-12 col-sm-10 col-md-8 mb-5">
        <h4 class="text-center mb-4">
            <i class="bi bi-chat-quote-fill text-primary me-2"></i>
            O que nossos investidores dizem
        </h4>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3 text-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-circle text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Carlos M.</h6>
                                <small class="text-muted">Investidor há <?= (date('Y') - 2024) ?> anos</small>
                            </div>
                        </div>
                        <p class="card-text">
                            <i class="bi bi-quote text-primary opacity-50"></i>
                            Investi R$ 50.000 e já resgatei R$ 85.000! Melhor decisão da minha vida!
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3 text-center" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-circle text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Ana P.</h6>
                                <small class="text-muted">Aposentada</small>
                            </div>
                        </div>
                        <p class="card-text">
                            <i class="bi bi-quote text-primary opacity-50"></i>
                            Minha renda mensal aumentou 40% com esses investimentos. Recomendo!
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3 text-center"  style="width: 50px; height: 50px;">
                                <i class="bi bi-person-circle text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Roberto S.</h6>
                                <small class="text-muted">Empresário</small>
                            </div>
                        </div>
                        <p class="card-text">
                            <i class="bi bi-quote text-warning opacity-50"></i>
                            Finalmente encontrei investimentos que entregam o que prometem!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <!-- FAQ com Pegadinhas Escondidas -->
        <div class="card border-0 shadow">
            <div class="card-header bg-light">
                <h5 class="mb-0">
                    <i class="bi bi-patch-question-fill text-primary me-2"></i>
                    Perguntas Frequentes
                </h5>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionFAQ">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Os retornos são realmente garantidos?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                <strong>Sim!</strong> Todos os nossos investimentos possuem garantia contratual de rentabilidade.
                                Utilizamos estratégias de hedge avançadas para proteger seu capital.
                                <small class="text-muted d-block mt-2">
                                    *Sujeito às condições de mercado e desempenho dos ativos subjacentes.
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Posso resgatar meu dinheiro a qualquer momento?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                <strong>Sim!</strong> Oferecemos liquidez diária para a maioria dos investimentos.
                                <small class="text-danger d-block mt-2">
                                    *Aplicável apenas após o período de carência mínimo de 90 dias.
                                    Resgates antecipados estão sujeitos a penalidades de até 30% do rendimento.
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Há alguma taxa escondida?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body">
                                <strong>Não!</strong> Trabalhamos com total transparência. Todas as taxas são divulgadas claramente.
                                <small class="text-muted d-block mt-2">
                                    Taxas de administração, performance, custódia e impostos podem ser aplicados conforme regulamentação.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Aviso "Importante" -->
    <div class="col-12 col-sm-10 col-md-8">
        <div class="alert alert-warning mt-4">
            <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill fs-4 me-1"></i> Importante</h5>
            <hr class="my-1">
            <p class="mb-0 text-center">
                Investimentos envolvem riscos. Rentabilidade passada não é garantia de retorno futuro.
                Consulte seu consultor financeiro antes de investir.
                <strong>Esta é uma simulação educacional para fins didáticos.</strong>
            </p>
        </div>
    </div>
</div>


<script>
    // Inicializar
    document.addEventListener('DOMContentLoaded', function() {
        // Efeitos visuais para chamar atenção
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.transition = 'transform 0.3s';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>