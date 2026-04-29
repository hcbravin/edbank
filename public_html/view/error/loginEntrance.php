<div class="row justify-content-center">
    <div class="col">

        <!-- Código de erro e ícone -->
        <div class="text-center my-5">
            <div class="d-inline-block position-relative">
                <span class="badge rounded-pill bg-danger fs-6">
                    ERRO
                </span>
            </div>
            <h1 class="display-5 fw-bold bank-primary mt-3">Desconectado</h1>
            <p class="lead">É necessário se conectar a sua conta.</p>
        </div>

        <!-- Mensagem de erro detalhada -->
        <div class="alert alert-warning border-warning">
            <div class="d-flex">
                <i class="bi bi-info-circle-fill fs-4 me-3 text-warning"></i>
                <div>
                    <h4 class="alert-heading">Fluxo de autenticação inválido detectado</h4>
                    <p class="mb-2">Identificamos que você tentou acessar sua conta utilizando um método de autenticação não autorizado. Por questões de segurança, nosso sistema só permite login através dos seguintes provedores:</p>
                    <ul class="mb-0">
                        <li><strong>Google Sign-In</strong> (recomendado)</li>
                        <li><strong>Apple ID</strong> (para dispositivos Apple)</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Motivos de segurança -->
        <div class="mb-5">
            <h3 class="h5 mb-3 bank-primary">
                <i class="bi bi-shield-check me-2"></i>Por que essa restrição?
            </h3>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-lock-fill text-success fs-4 me-2"></i>
                                <h5 class="card-title mb-0">Autenticação de Dois Fatores</h5>
                            </div>
                            <p class="card-text">Os provedores Google e Apple oferecem autenticação de dois fatores nativa, aumentando a segurança da sua conta.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-person-check-fill text-success fs-4 me-2"></i>
                                <h5 class="card-title mb-0">Identidade Verificada</h5>
                            </div>
                            <p class="card-text">Estes provedores já realizaram uma verificação de identidade, garantindo que você é realmente quem diz ser.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Opções de login -->
        <div class="mb-5">
            <h3 class="h5 mb-4 bank-primary">
                <i class="bi bi-box-arrow-in-right me-2"></i>Como acessar sua conta corretamente
            </h3>

            <div class="row g-4">
                <!-- Google Login -->
                <div class="col-md-6">
                    <div class="card h-100 text-center border-bank">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-google fs-1" style="color: #DB4437;"></i>
                            </div>
                            <h5 class="card-title">Google Sign-In</h5>
                            <p class="card-text">Use sua conta do Google para acessar com segurança.<br/>Recomendado para todos os dispositivos.</p>
                            <button type="button" class="btn btn-outline-primary w-100" id="google-login-btn" onclick="$('#UserLoginModal').modal('show');">
                                <i class="bi bi-google me-2"></i>Entrar com Google
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Apple Login -->
                <div class="col-md-6">
                    <div class="card h-100 text-center border-bank">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="bi bi-apple fs-1"></i>
                            </div>
                            <h5 class="card-title">Apple ID</h5>
                            <p class="card-text">Use seu Apple ID para acessar.<br/>Recomendado para usuários de dispositivos Apple.</p>
                            <button type="button" class="btn btn-dark w-100" id="apple-login-btn" onclick="$('#UserLoginModal').modal('show');">
                                <i class="bi bi-apple me-2"></i>Entrar com Apple
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informações de segurança (inicialmente ocultas) -->
    <div class="card mt-4" id="security-info">
        <div class="card-header bg-light">
            <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>Informações de Segurança</h5>
        </div>
        <div class="card-body">
            <p>Por questões de segurança e conformidade com regulamentações bancárias, nosso sistema implementou as seguintes medidas:</p>
            <ul>
                <li><strong>Autenticação via provedores confiáveis</strong>: Reduz riscos de phishing e ataques de credenciais</li>
                <li><strong>Conformidade com LGPD</strong>: Seus dados são tratados com total privacidade</li>
                <li><strong>Prevenção de fraudes</strong>: Monitoramento contínuo de tentativas de acesso suspeitas</li>
                <li><strong>Regulamentação BACEN</strong>: Seguimos as normas de segurança do Banco Central</li>
            </ul>
            <p class="mb-0">Essas medidas garantem a segurança dos seus dados e transações financeiras.</p>
        </div>
    </div>
    </div>
</div>
    