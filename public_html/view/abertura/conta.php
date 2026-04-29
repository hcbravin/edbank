<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-8">
        <!-- Card principal - Multi-step -->
        <div class="card shadow">
            <!-- Cabeçalho com progresso -->
            <div class="card-header bg-primary text-white ft-12 fw-bold">
                <i class="bi bi-person-plus me-1"></i>
                <span class="">Criar Conta Bancária</span>
            </div>

            <!-- Corpo do formulário -->
            <div class="card-body">
                <!-- PASSO 1: Informações sobre contas -->
                <div id="conta-step-1" class="collapse multi-collapse">
                    <!-- Introdução -->
                    <div class="text-center mb-5">
                        <i class="bi bi-bank text-primary" style="font-size: 3.5rem;"></i>
                        <h2 class="mt-3 mb-3">Informações sobre Contas Bancárias</h2>
                        <p class="text-muted">
                            Antes de criar sua conta, conheça as condições e responsabilidades
                        </p>
                    </div>

                    <!-- Tipos de Conta -->
                    <div class="mb-5">
                        <h4 class="h5 text-primary mb-4">
                            <i class="bi bi-credit-card me-2"></i>
                            Tipos de Conta Disponíveis
                        </h4>

                        <div class="row g-4">
                            <!-- Conta Corrente -->
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">Conta Corrente</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">
                                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                                            Para transações diárias
                                        </h6>
                                        <ul class="mb-3">
                                            <li>Depósitos e saques</li>
                                            <li>Transferências</li>
                                            <li>Pagamento de contas</li>
                                            <li>Extrato mensal</li>
                                        </ul>
                                        <div class="alert alert-light border">
                                            <small>
                                                <strong>Taxa de manutenção:</strong> Simulada<br>
                                                <strong>Rendimento:</strong> Não aplicável
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Conta Poupança -->
                            <!-- <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">Conta Poupança</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-3 text-muted">
                                            <i class="bi bi-piggy-bank-fill text-success me-2"></i>
                                            Para guardar recursos
                                        </h6>
                                        <ul class="mb-3">
                                            <li>Rendimento simulado</li>
                                            <li>Resgate imediato</li>
                                            <li>Sem taxas de manutenção</li>
                                            <li>Depósitos mensais</li>
                                        </ul>
                                        <div class="alert alert-light border">
                                            <small>
                                                <strong>Taxa de manutenção:</strong> Não tem<br>
                                                <strong>Rendimento:</strong> Simulado mensal
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Taxas e Encargos -->
                    <div class="mb-5">
                        <h4 class="h5 text-primary mb-4">
                            <i class="bi bi-cash-coin me-2"></i>
                            Taxas Simuladas
                        </h4>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Serviço</th>
                                        <th>Conta Corrente</th>
                                        <th>Conta Poupança</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Manutenção mensal</td>
                                        <td class="text-danger">R$ 10,00*</td>
                                        <td class="text-success">Isenta</td>
                                    </tr>
                                    <tr>
                                        <td>Transferência entre bancos</td>
                                        <td>R$ 5,00*</td>
                                        <td>R$ 5,00*</td>
                                    </tr>
                                    <tr>
                                        <td>Extrato</td>
                                        <td class="text-success">Gratuito</td>
                                        <td class="text-success">Gratuito</td>
                                    </tr>
                                    <tr>
                                        <td>Saques</td>
                                        <td>R$ 2,00* cada</td>
                                        <td>R$ 2,00* cada</td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                * Valores simulados para fins educacionais
                            </small>
                        </div>
                    </div>

                    <!-- Responsabilidades -->
                    <div class="mb-5">
                        <h4 class="h5 text-primary mb-4">
                            <i class="bi bi-shield-check me-2"></i>
                            Suas Responsabilidades
                        </h4>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-key text-primary fs-5 me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Segurança dos Dados</h6>
                                                <small class="text-muted">Mantenha suas credenciais em sigilo</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-clock-history text-primary fs-5 me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Monitoramento</h6>
                                                <small class="text-muted">Acompanhe suas transações regularmente</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-flag text-primary fs-5 me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Denúncia</h6>
                                                <small class="text-muted">Reporte atividades suspeitas imediatamente</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex mb-3">
                                            <i class="bi bi-book text-primary fs-5 me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Conhecimento</h6>
                                                <small class="text-muted">Informe-se sobre as condições da conta</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Termos de Uso -->
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">
                                    <i class="bi bi-file-text me-2"></i>
                                    Termos de Uso da Conta
                                </h6>
                            </div>
                            <div class="card-body">
                                <div style="max-height: 150px; overflow-y: auto;" class="mb-3 p-3 border rounded">
                                    <small>
                                        1. Esta é uma conta simulada para fins educacionais.<br>
                                        2. Não envolve transações financeiras reais.<br>
                                        3. Todos os valores são fictícios.<br>
                                        4. A conta será vinculada ao seu perfil na plataforma.<br>
                                        5. Você pode fechar a conta a qualquer momento.<br>
                                        6. Não há garantia de disponibilidade contínua.<br>
                                        7. Dados são armazenados conforme LGPD.<br>
                                        8. Uso exclusivo para atividades educacionais.
                                    </small>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agencia-aceite-termos">
                                    <label class="form-check-label" for="agencia-aceite-termos">
                                        Li e concordo com os termos de uso acima
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botões passo 1 -->
                    <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                        <button class="btn btn-outline-secondary" onclick="window.location='/';">
                            <i class="bi bi-house me-2"></i>
                            Home
                        </button>
                        <button class="btn btn-primary" id="agencia-abrir-continuar" disabled onclick="goTop();"  data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="conta-step-1 conta-step-2">
                            Próximo Passo
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- PASSO 2: Dados da agência -->
                <form action="/exe/conta/nova" method="post">
                    <div id="conta-step-2" class="collapse multi-collapse show">
                        <!-- Cabeçalho do passo 2 -->
                        <div class="text-center mb-5">
                            <i class="bi bi-building text-primary" style="font-size: 3.5rem;"></i>
                            <h2 class="mt-3 mb-3">Vincular à Agência</h2>
                            <p class="text-muted">
                                Escolha a agência onde sua conta será criada
                            </p>
                        </div>

                        <!-- Tipo de Conta (ainda pode escolher) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-credit-card me-2"></i>
                                Tipo de Conta
                            </label>
                            <div class="row g-3">
                                <div class="col">
                                    <div class="card tipo-conta border-primary" data-tipo="corrente">
                                        <div class="card-body text-center">
                                            <i class="bi bi-credit-card-2-front fs-3 text-primary mb-3"></i>
                                            <h6 class="card-title">Conta Corrente</h6>
                                            <small class="text-muted d-block">Para transações diárias</small>
                                            <small class="text-danger">Taxa de manutenção: R$ 10,00/mês*</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted mt-2 d-block">
                                <i class="bi bi-info-circle me-1"></i>
                                * Valores simulados para fins educacionais
                            </small>
                        </div>

                        <!-- Seleção de Agência -->
                        <div class="mb-4">
                            <label for="agencia" class="form-label fw-bold">
                                <i class="bi bi-bank me-2"></i>
                                Agência Bancária
                            </label>

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-bank"></i>
                                </span>
                                <input type="text" class="form-control" id="search-agencia" placeholder="Informe o número da agência.">
                                <button type="button" id="agencia-buscarar" class="btn btn-secondary">
                                    <i class="bi bi-search me-1"></i> Buscar
                                </button>
                            </div>

                            <!-- Lista de Agências -->
                                <!-- Agência 1 -->
                                <div class="infomain bd-1 bd-success collapse" id="agencia-info-card">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-8 col-lg-9">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">Agência <span id="agencia-info-numero">???</span></h6>
                                                <input type="hidden" name="agencia-id" id="agencia-id" value="">
                                            </div>
                                            <p class="mb-1 small">
                                                <i class="bi bi-geo-alt me-1"></i>
                                                <span id="agencia-info-endereco">Av. Principal, 1000 - Centro</span>
                                            </p>
                                            <p class="mb-1 small" id="agencia-info-tipo">
                                                <i class="bi bi-unlock me-1"></i>
                                                <span>Agência Pública</span>
                                            </p>
                                            <p class="mb-1 small">
                                                <i class="bi bi-person-square me-1"></i>
                                                <span id="agencia-info-gerente">Nome</span>
                                            </p>

                                        </div>
                                        <div class="col-sm-6 col-md-4 col-lg-3 align-self-center">
                                            <div class="form-group text-center text-sm-end">
                                                <label for="agencia-codigo" class="main">Código de acesso <i class="bi bi-lock ms-1"></i></label>
                                                <input type="text" class="form-control form-control-sm text-center" name="agencia-codigo" id="agencia-codigo" placeholder="5 Algarismos" disabled required minlength="5" maxlength="5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="agencia-info-alert" class="collapse">
                                    <div class="infomain bd-1 bd-danger text-danger">
                                        <i class="bi bi-exclamation-triangle-fill me-1"></i> Agência não encontrada!
                                    </div>
                                </div>
                        </div>


                        <!-- Botões passo 2 -->
                        <div class="d-flex justify-content-between mt-4 pt-4 border-top">
                            <button class="btn btn-outline-secondary" onclick="goTop();"  data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="conta-step-1 conta-step-2">
                                <i class="bi bi-arrow-left me-2"></i>
                                Voltar
                            </button>
                            <button class="btn btn-success" id="btn-criar-conta" type="submit" disabled>
                                <i class="bi bi-check-circle me-2"></i>
                                Criar Conta
                            </button>
                            <?= Token(); ?>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- Aviso importante -->
        <div class="text-center mt-4">
            <div class="alert alert-light border">
                <small class="text-muted">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Esta é uma simulação educacional. Não envolve transações financeiras reais.
                </small>
            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        
    });
</script>