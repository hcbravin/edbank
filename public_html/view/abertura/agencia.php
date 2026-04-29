<?php 
    alert('Abertura de novas agências indisponível no momento.'); goto Fim;  
?>

<div class="row justify-content-center collapse multi-collapse show" id="AgenciaInfo">
    <div class="col-lg-10 col-xl-8">
        <!-- Card principal -->
        <div class="card shadow">
            <!-- Cabeçalho -->
            <div class="card-header text-bg-primary">
                <i class="bi bi-info-circle me-1"></i>
                <span class="card-title mb-0">Informações sobre Criação de Agências</span>
            </div>

            <!-- Corpo -->
            <div class="card-body p-md-5">
                <!-- Introdução -->
                <div class="text-center mb-5">
                    <i class="bi bi-bank2 text-primary" style="font-size: 4rem;"></i>
                    <h2 class="mt-3 mb-2">Para quem é a criação de agências?</h2>
                    <p class="lead text-muted">
                        Entenda quem pode e por que criar agências dentro do jogo
                    </p>
                </div>

                <!-- Seção 1: Para quem é destinado -->
                <div class="mb-5">
                    <h3 class="h4 text-primary mb-4">
                        <i class="bi bi-people-fill me-2"></i>
                        Destinatários da Funcionalidade
                    </h3>

                    <div class="row g-4">
                        <!-- Card 1 -->
                        <div class="col-md-6">
                            <div class="card h-100 border-primary">
                                <div class="card-body text-center p-4">
                                    <div class="mb-3">
                                        <i class="bi bi-person-badge text-primary fs-1"></i>
                                    </div>
                                    <h5 class="card-title">Professores</h5>
                                    <p class="card-text">
                                        Criem agências para simular diferentes cenários bancários em suas aulas,
                                        permitindo que estudantes vivenciem situações reais do mercado financeiro.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-6">
                            <div class="card h-100 border-primary">
                                <div class="card-body text-center p-4">
                                    <div class="mb-3">
                                        <i class="bi bi-mortarboard text-primary fs-1"></i>
                                    </div>
                                    <h5 class="card-title">Estudantes Avançados</h5>
                                    <p class="card-text">
                                        Grupos de estudantes que desejam aprofundar conhecimentos em gestão bancária
                                        através da simulação prática de operações de uma agência real.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seção 2: Objetivos educacionais -->
                <div class="mb-5">
                    <h3 class="h4 text-primary mb-4">
                        <i class="bi bi-book me-2"></i>
                        Objetivos Educacionais
                    </h3>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="bi bi-graph-up text-success me-2"></i>
                                        Aprendizado Prático
                                    </h6>
                                    <p class="card-text small">
                                        Aplicar conceitos teóricos de administração bancária em um ambiente simulado seguro.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="bi bi-lightbulb text-warning me-2"></i>
                                        Tomada de Decisão
                                    </h6>
                                    <p class="card-text small">
                                        Desenvolver habilidades de gestão e análise através de decisões estratégicas.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="bi bi-shuffle text-info me-2"></i>
                                        Simulação Realista
                                    </h6>
                                    <p class="card-text small">
                                        Vivenciar situações do mercado financeiro sem riscos reais.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seção 3: Como funciona -->
                <div class="mb-5">
                    <h3 class="h4 text-primary mb-4">
                        <i class="bi bi-gear me-2"></i>
                        Como Funciona no Jogo
                    </h3>

                    <div class="accordion" id="accordionComoFunciona">
                        <!-- Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    <i class="bi bi-1-circle text-primary me-2"></i>
                                    Criação da Agência
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionComoFunciona">
                                <div class="accordion-body">
                                    <p>Professores ou estudantes designados criam agências virtuais com CEP específico para simular localização real.</p>
                                    <p class="mb-0">
                                        <small class="text-muted">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Cada agência funciona como um banco independente dentro do jogo.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    <i class="bi bi-2-circle text-primary me-2"></i>
                                    Gestão de Operações
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionComoFunciona">
                                <div class="accordion-body">
                                    <p>A agência pode ser configurada como "trancada" (em manutenção) ou operacional, simulando diferentes estados de funcionamento.</p>
                                    <p class="mb-0">
                                        <small class="text-muted">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Permite pausar atividades para ajustes ou manutenções simuladas.
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    <i class="bi bi-3-circle text-primary me-2"></i>
                                    Uso Educacional
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionComoFunciona">
                                <div class="accordion-body">
                                    <p>As agências servem como laboratórios para práticas de:</p>
                                    <ul class="mb-0">
                                        <li>Gestão de caixa bancário</li>
                                        <li>Atendimento ao cliente simulado</li>
                                        <li>Análise de crédito</li>
                                        <li>Operações bancárias básicas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seção 4: Importante -->
                <div class="alert alert-primary">
                    <div class="d-flex">
                        <i class="bi bi-exclamation-diamond fs-4 me-3"></i>
                        <div>
                            <h5 class="alert-heading">Aviso Importante</h5>
                            <p class="mb-0">
                                Esta funcionalidade é <strong>exclusivamente para fins educacionais</strong>.
                                Todas as operações são simuladas e não envolvem transações financeiras reais.
                                O jogo não armazena dados bancários reais dos usuários.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Botões de ação -->
                <div class="d-flex justify-content-between mt-5 pt-4 border-top">
                    <button class="btn btn-outline-secondary" onclick="window.location='/';">
                        <i class="bi bi-house me-2"></i>
                        Home
                    </button>
                    <button class="btn btn-primary" id="AgenciaCreate" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="AgenciaForm AgenciaInfo" onclick="$('html, body').animate({ scrollTop: 0 }, 300);">
                        <i class="bi bi-plus-circle me-2"></i>
                        Iniciar Criação de Agência
                    </button>
                </div>
            </div>
        </div>

        <!-- Rodapé informativo -->
        <div class="text-center mt-4">
            <p class="text-muted small">
                <i class="bi bi-shield-check me-1"></i>
                Plataforma educacional segura | Conformidade LGPD | Fins exclusivamente didáticos
            </p>
        </div>
    </div>
</div>

<div class="row justify-content-center collapse multi-collapse" id="AgenciaForm">
    <div class="col-lg-10 col-xl-8">
        <form action="/exe/nova-agencia" method="post">

        
            <!-- Card principal -->
            <div class="card shadow">
                <!-- Cabeçalho -->
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center ft-12">
                        <i class="bi bi-building me-1"></i>
                        <span class="card-title mb-0">Abertura de Nova Agência</span>
                    </div>
                </div>

                <!-- Corpo do formulário -->
                <div class="card-body p-4">

                    <!-- Campo CEP -->
                    <div class="mb-4">
                        <label for="cep" class="form-label fw-bold">
                            <i class="bi bi-geo-alt me-2"></i>
                            CEP da Agência
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-postcard"></i>
                            </span>
                            <input type="text" class="form-control" name="agencia[cep]" id="agencia-cep" placeholder="00000-000" maxlength="9" required>
                            <button class="btn btn-outline-secondary" type="button" id="buscar-cep">
                                <i class="bi bi-search"></i>
                                Buscar
                            </button>
                        </div>
                        <div class="form-text">
                            Digite o CEP onde a agência será localizada
                        </div>

                        <!-- Resultado da busca do CEP (inicialmente oculto) -->
                        <div class="card mt-3 d-none" id="cep-result">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <small class="text-muted">Endereço</small>
                                        <span class="fw-bold" id="cep-endereco">???</span>
                                    </div>
                                    <div class="col-md-12">
                                        <small class="text-muted">Bairro</small>
                                        <span class="fw-bold" id="cep-bairro">???</span>
                                    </div>
                                    <div class="col-md-12">
                                        <small class="text-muted me-2">Cidade/UF:</small>
                                        <span class="fw-bold" id="cep-cidade">???</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campo Trancado (Toggle) -->
                    <div class="mb-4">
                        <label class="form-label fw-bold d-flex justify-content-between align-items-center">
                            <span>
                                <i class="bi bi-lock me-2"></i>
                                Agência Trancada
                            </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="agencia[key]" value="1" id="trancado-toggle">
                            </div>
                        </label>

                        <!-- Cards explicativos -->
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="card h-100 border-success" id="card-trancado-off">
                                    <div class="card-body text-center bg-success bg-opacity-10">
                                        <i class="bi bi-unlock-fill text-success fs-3 mb-3"></i>
                                        <h6 class="card-title">Aberta</h6>
                                        <p class="card-text small text-muted text-success">
                                            Qualquer pessoa poderá acessar a agência e seus serviços
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100" id="card-trancado-on">
                                    <div class="card-body text-center bg-opacity-10">
                                        <i class="bi bi-lock-fill fs-3 mb-3"></i>
                                        <h6 class="card-title">Trancada</h6>
                                        <p class="card-text small text-muted">
                                            Somente usuários com a senha de acesso poderão utilizar a agência
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campo Aceite dos Termos -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="bi bi-file-text me-2"></i>
                                    Termos e Condições
                                </h6>
                            </div>
                            <div class="card-body">
                                <!-- Texto dos termos (scrollable) -->
                                <div style="max-height: 200px; overflow-y: auto;" class="mb-3 p-3 border rounded">
                                    <h6>Termos de Abertura de Agência</h6>
                                    <p class="small">
                                        1. A abertura de agência está sujeita à aprovação da diretoria.<br>
                                        2. O responsável pela agência deve ter curso de gestão bancária.<br>
                                        3. A agência deve seguir todas as normas do Banco Central.<br>
                                        4. O horário de funcionamento deve ser divulgado claramente.<br>
                                        5. Todas as transações devem ser registradas no sistema.<br>
                                        6. A segurança da agência é de responsabilidade do gerente.<br>
                                        7. O caixa deve ser fechado diariamente com conferência.<br>
                                        8. Relatórios devem ser enviados mensalmente à matriz.<br>
                                        9. A agência deve manter reserva mínima estabelecida.<br>
                                        10. O descumprimento dos termos pode resultar em fechamento.
                                    </p>
                                </div>

                                <!-- Checkbox de aceite -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agencia[termos]" id="agencia-aceite-termos">
                                    <label class="form-check-label" for="agencia-aceite-termos">
                                        Eu li e concordo com os termos e condições acima
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Validações -->
                    <div class="alert alert-warning" id="validation-alert">
                        <div class="d-flex">
                            <i class="bi bi-exclamation-triangle me-3"></i>
                            <div>
                                <h6 class="alert-heading">Atenção</h6>
                                <p class="mb-0 small">Preencha todos os campos obrigatórios para continuar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rodapé com botões -->
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="AgenciaForm AgenciaInfo" onclick="goTop();">
                            <i class="bi bi-arrow-left me-2"></i>
                            Voltar
                        </button>
                        <button type="submit" class="btn btn-primary" id="agencia-abrir-continuar" disabled>
                            Abrir Agência
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                        <?= Token(); ?>
                    </div>
                </div>
            </div>

            <!-- Informações adicionais -->
            <div class="text-center mt-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            <i class="bi bi-info-circle me-2"></i>
                            Informações Importantes
                        </h6>
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    <i class="bi bi-clock me-1"></i>
                                    Prazo de análise: 5 dias úteis
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    <i class="bi bi-telephone me-1"></i>
                                    Dúvidas: 0800 123 4567
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php Fim: ?>