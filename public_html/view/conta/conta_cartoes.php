<div class="row justify-content-center">
    <div class="col-12 col-sm-8 text-end">
        <a href="/conta/<?= $URI[1]; ?>/cartoes/novo" class="btn btn-warning btn-sm w-px-150"><i class="bi bi-credit-card-2-front-fill me-1"></i> Solicitar Cartão</a>
    </div>

    <div class="col-12 col-sm-8 mt-3 mb-2">
        <div class="infomain bd-1 bd-primary shadow-md">
            <i class="bi bi-credit-card-2-front-fill me-1"></i> Meus Cartões
        </div>
    </div>


    <div class="col-12 col-sm-8">
        <?php if (!isset($fConta['cartoes']) OR count($fConta['cartoes']) == 0 OR $CartoesAtivos == 0) { // Caso não se tenha cartão registrado 
        ?>
            <div class="infomain text-center shadow-md">
                Observamos que você não tem nenhum cartão registrado.
                <br>
                Não perca tempo, peça já seu cartão e disfrute de até 45 dias para pagar.
            </div>
        <?php } else { ?>
            <!-- Seletor de Cartões -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Selecione um Cartão</h6>
                    <small class="text-muted"><?= count($fConta['cartoes']); ?> cartões disponíveis</small>
                </div>

                <!-- Tabs dos Cartões -->
                <ul class="nav nav-pills nav-fill mb-3" id="cartoesTab" role="tablist">
                    <?php foreach ($fConta['cartoes'] as $KeyC => $ViewC) { if($ViewC['card_ativo'] == 1 OR $ViewC['card_fatura_valor'] > 0){ // Só exibe cartões ativos ou com fatura pendente ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= ($CartoesTipoFirsKey == $KeyC) ? 'active' : '' ?>" id="card<?= $KeyC; ?>-tab" data-bs-toggle="tab" data-bs-target="#CardTab<?= $KeyC; ?>" role="tab" aria-controls="card<?= $KeyC; ?>" aria-selected="true" type="button">
                                <i class="bi bi-credit-card me-1"></i>
                                <?= $ViewC['card_tipo_nome']; ?>
                            </button>
                        </li>
                    <?php }} ?>
                </ul>

                <!-- Conteúdo dos Tabs -->
                <div class="tab-content" id="cartoesTabContent">
                    <?php foreach ($fConta['cartoes'] as $KeyC => $ViewC) {  if($ViewC['card_ativo'] == 1 OR $ViewC['card_fatura_valor'] > 0){ ?>
                        <!-- Cartão <?= $KeyC; ?> -->
                        <div class="tab-pane fade <?= $CartoesTipoFirsKey == $KeyC ? 'show active' : ''; ?>" id="CardTab<?= $KeyC; ?>" aria-labelledby="card<?= $KeyC; ?>-tab" role="tabpanel">

                            <div class="infomain bd-1 alert alert-danger bd-danger mb-3 shadow-md <?= $ViewC['card_ativo'] ? 'd-none' : ''; ?>">
                                Seu cartão de crédito está inativo ou foi cancelado.
                            </div>

                            <!-- Visual do Cartão -->
                            <div class="card border-0 shadow-lg mb-4 text-bg-<?= $ViewC['card_tipo_color']; ?>">
                                <div class="card-body p-4">
                                    <!-- Chip e Bandeira -->
                                    <div class="d-flex justify-content-between align-items-start mb-4">
                                        <div>
                                            <i class="bi bi-cpu fs-1 opacity-75"></i>
                                        </div>
                                        <div class="text-end">
                                            <i class="bi bi-shield-check fs-4 me-2 opacity-75"></i>
                                            <span class="badge bg-light text-primary">VISA</span>
                                        </div>
                                    </div>

                                    <!-- Número do Cartão -->
                                    <div class="mb-4">
                                        <small class="opacity-75">Número do Cartão</small>
                                        <h2 class="mb-0">
                                            <span class="me-3">●●●●</span>
                                            <span class="me-3">●●●●</span>
                                            <span class="me-3">●●●●</span>
                                            <span><?= substr($ViewC['card_numero'], -4); ?></span>
                                        </h2>
                                    </div>

                                    <!-- Nome e Validade -->
                                    <div class="row">
                                        <div class="col-8">
                                            <small class="opacity-75 d-block">Nome no Cartão</small>
                                            <h5 class="mb-0 text-uppercase"><?= $MS['user_nome']; ?></h5>
                                        </div>
                                        <div class="col-4 text-end">
                                            <small class="opacity-75 d-block">Validade</small>
                                            <h5 class="mb-0"><?= date('m/y', strtotime($ViewC['card_validade'])); ?></h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="card-footer bg-primary bg-opacity-25 border-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                                            <span>Cartão de Crédito • <?= $ViewC['card_ativo'] ? 'Ativo' : 'Inativo'; ?></span>
                                        </div>
                                        <div>
                                            <small>CVV: ●●●</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informações Financeiras -->
                            <div class="row g-3 mb-4">
                                <!-- Limite Disponível -->
                                <div class="col-12 col-sm-6">
                                    <div class="card h-100 border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3 text-center square-40">
                                                    <i class="bi bi-wallet2 text-primary"></i>
                                                </div>
                                                <div>
                                                    <small class="text-muted d-block">Limite Disponível</small>
                                                    <h4 class="mb-0">R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', '.'); ?></h4>
                                                </div>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= (100 * $ViewC['card_limite_livre'] / $ViewC['card_limite']); ?>%;"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <small>Limite Total</small>
                                                <small class="text-muted">R$ <?= number_format($ViewC['card_limite'], 2, ',', '.'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fatura Atual -->
                                <div class="col-12 col-sm-6">
                                    <div class="card h-100 border-warning">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3 text-center square-40">
                                                        <i class="bi bi-receipt text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block">Fatura Atual</small>
                                                        <h4 class="mb-0 text-warning">R$ <?= number_format($ViewC['card_fatura_valor'], 2, ',', '.'); ?></h4>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <small class="text-muted me-2">Vencimento</small><br>
                                                    <small class="badge text-bg-warning"><?= $ViewC['card_fatura_vencimento']; ?></small>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn me-1 btn-sm btn-warning cartoesFaturaPagar" data-eb-final="<?= substr($ViewC['card_numero'], -4); ?>" data-bs-target="#ModalCartoesPagar" data-bs-toggle="modal" data-eb-tipo="<?= $ViewC['card_tipo_nome']; ?>" data-eb-color="<?= $ViewC['card_tipo_color']; ?>" data-eb-id="<?= $ViewC['card_id']; ?>" data-eb-fatura="<?= number_format($ViewC['card_fatura_valor'], 2, '.', ''); ?>" data-eb-vencimento="<?= $ViewC['card_fatura_vencimento']; ?>"><i class="bi bi-credit-card-2-front me-1"></i> Pagar Fatura</button>
                                                <a href="/conta/<?= $URI[1]; ?>/cartoes/<?= $ViewC['card_id']; ?>/faturas" class="btn ms-1 btn-sm btn-outline-primary"><i class="bi bi-file-earmark-text me-1"></i> Abrir Fatura</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>