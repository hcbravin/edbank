<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient text-center py-4" style="background: linear-gradient(135deg, #1e3c72, #2a5298);">
                <h1 class="display-5 fw-bold mb-2">Escolha seu Cartão de Crédito</h1>
                <p class="lead mb-0">Compare os benefícios e encontre o cartão ideal para você</p>
            </div>
            <div class="card-body p-4 p-md-5">

                <!-- Carrossel de Cartões -->
                <div id="novoCartaoCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php foreach($CartoesTipo as $KeyC => $ViewC){ ?>
                        <button type="button" data-bs-target="#novoCartaoCarousel" data-bs-slide-to="<?= $KeyC;?>" aria-label="Slide <?= $KeyC;?>" <?= ($CartoesTipoFirsKey == $KeyC) ? 'class="active" aria-current="true"' : ''; ?>></button>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner rounded">
                        <?php foreach($CartoesTipo as $KeyC => $ViewC){ ?>
                        <div class="carousel-item <?= ($CartoesTipoFirsKey == $KeyC) ? 'active' : ''; ?>">
                            <div class="row g-4 justify-content-center align-items-center">
                                <div class="col-md-8">
                                    <div class="card border-0 shadow h-100">
                                        <div class="card-body p-4 text-center">
                                            <div class="mb-4">
                                                <div class="bg-<?= $ViewC['color']; ?> text-white rounded p-3 mb-3">
                                                    <h3 class="mb-0 text-uppercase"><?= $ViewC['tipo']; ?></h3>
                                                </div>
                                                <div class="my-4">
                                                    <h2 class="text-<?= $ViewC['color']; ?>">Anuidade R$ <?= $ViewC['anuidadeDesconto'] ? '0' : $ViewC['anuidade']; ?>,00</h2>
                                                    <p class="text-muted <?= $ViewC['anuidadeDesconto'] ? '' : 'd-none'; ?>">Após <?= $ViewC['anuidadeDesconto']; ?> meses o valor será de R$ <?= $ViewC['anuidade']; ?>,00 por ano</p>
                                                    <p class="text-muted <?= $ViewC['anuidadeIsento'] ? '' : 'd-none'; ?>">Isento para gastos acima de R$ <?= $ViewC['anuidadeIsento']; ?>,00/mês</p>
                                                </div>
                                            </div>

                                            <h5 class="mb-3">Benefícios:</h5>
                                            <ul class="list-unstyled mb-4">
                                                <?php foreach($ViewC['beneficios'] as $KeyB => $ViewB){ ?>
                                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><?= $ViewB; ?></li>
                                                <?php } ?>
                                            </ul>

                                            <h5 class="mb-3">Taxas:</h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-2"><i class="bi bi-percent text-<?= $ViewC['color']; ?> me-2"></i>Juros rotativo: <?= $ViewC['jurosRotativo']; ?>% ao mês</li>
                                                <li class="mb-2"><i class="bi bi-arrow-repeat text-<?= $ViewC['color']; ?> me-2"></i>SAQUE: <?= $ViewC['jurosSaque']; ?>% + R$ 6,00</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card h-100 border-0 text-bg-<?= $ViewC['color']; ?> text-white shadow-lg" style="transform: rotate(5deg);">
                                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-start mb-4">
                                                    <h4 class="mb-0"><?= $ViewC['tipo']; ?></h4>
                                                    <div class="bg-warning rounded p-1 px-2">
                                                        <small class="text-dark fw-bold">VISA</small>
                                                    </div>
                                                </div>
                                                <div class="my-4">
                                                    <h2 class="mb-0">•••• •••• •••• 4567</h2>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <small>JOÃO DA SILVA</small>
                                                        <small>12/28</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div class="bg-light rounded p-1 px-2">
                                                    <small class="text-<?= $ViewC['color']; ?> fw-bold">chip</small>
                                                </div>
                                                <div class="text-end">
                                                    <div class="bg-warning rounded-circle d-inline-block p-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#novoCartaoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#novoCartaoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Próximo</span>
                    </button>
                </div>

                <!-- Seleção e Botão de Solicitação -->
                <div class="row mt-5">
                    <div class="col-md-8 mx-auto">
                        <form action="/exe/conta/cartao/novo" method="post">
                            <div class="card border-0 bg-light">
                                <div class="card-body p-4 text-center">
                                    <h4 class="mb-4">Selecionar Cartão</h4>
                                    <div class="row mb-4">
                                        <?php foreach($CartoesTipo as $KeyC => $ViewC){ ?>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-check card-option p-3 rounded border text-bg-<?= $ViewC['color']; ?>">
                                                <input class="form-check-input" type="radio" name="novoCartao" id="option<?= $KeyC; ?>" value="<?= $ViewC['id']; ?>" required>
                                                <label class="form-check-label fw-bold" for="option<?= $KeyC; ?>">
                                                    <?= $ViewC['tipo']; ?>
                                                </label>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <button class="btn btn-success btn-lg px-5 py-3 fw-bold" id="requestButton">
                                        Solicitar Cartão Selecionado
                                    </button>
                                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                                    <?= Token(); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informações Adicionais -->
        <div class="mt-4 text-center">
            <p class="text-muted">Sua solicitação será analisada e em breve entraremos em contato.</p>
            <p class="text-muted small">Consulte condições e regulamentos completos no site do banco.</p>
        </div>
    </div>
</div>
</div>

<!-- Script para manipulação do carrossel e seleção -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('novoCartaoCarousel');
        const novoCartaos = document.querySelectorAll('input[name="novoCartao"]');
        const requestButton = document.getElementById('requestButton');

        // Sincroniza o carrossel com a seleção do rádio
        novoCartaos.forEach((option, index) => {
            option.addEventListener('change', function() {
                if (this.checked) {
                    const carouselInstance = bootstrap.Carousel.getInstance(carousel);
                    carouselInstance.to(index);
                }
            });
        });
    });
</script>