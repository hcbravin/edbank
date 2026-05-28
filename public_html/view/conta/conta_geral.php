<div class="row justify-content-center mb-3">
    <!-- Minha Profissao -->
    <div class="col-12 col-sm-12 col-md-8">
        <div class="infomain bd-1 bd-dark d-flex justify-content-between align-items-center">
            <span>Profissão: <strong><?= $fConta['pf_nome']; ?></strong></span>
            <span>Salário: <strong>R$ <?= number_format($fConta['pf_salario'], 2, ',', '.'); ?></strong></span>  
        </div>
    </div>
</div>

<!-- Ações Rápidas -->
<div class="row justify-content-center mb-4">
    <div class="col-12 col-sm-8">

        <div class="row pb-2">
            <div class="col-12 col-sm-12 col-md-8">
                <h5 class="mb-3">Ações rápidas</h5>
            </div>
        </div>
        <div class="row justify-content-sm-center justify-content-md-start overflow-auto pb-2">
            <div class="col-4 col-md-3 col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/transferir" class="btn btn-outline-primary w-100">
                    <i class="bi bi-arrow-up-circle-fill fs-4"></i>
                    <br>
                    <small>Transferir</small>
                </a>
            </div>
            <div class="col-4 col-md-3 col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/pagar" class="btn btn-outline-primary w-100">
                    <i class="bi bi-upc-scan fs-4"></i>
                    <br>
                    <small>Pagar</small>
                </a>
            </div>
            <div class="col-4 col-md-3 col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/pix" class="btn btn-outline-primary w-100">
                    <i class="bi bi-x-diamond-fill fs-4"></i>
                    <br>
                    <small>Área Pix</small>
                </a>
            </div>
            <div class="col-4 col-md-3  col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/cartoes" class="btn btn-outline-primary w-100">
                    <i class="bi bi-credit-card-2-back-fill fs-4"></i>
                    <br>
                    <small>Cartões</small>
                </a>
            </div>
            <div class="col-4 col-md-3  col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/investimentos" class="btn btn-outline-primary w-100">
                    <i class="bi bi-currency-dollar fs-4"></i>
                    <br>
                    <small>Investir</small>
                </a>
            </div>
            <div class="col-4 col-md-3  col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/extrato" class="btn btn-outline-primary w-100">
                    <i class="bi bi-file-earmark-text-fill fs-4"></i>
                    <br>
                    <small>Extrato</small>
                </a>
            </div>
            <div class="col-4 col-md-3  col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/shopping" class="btn btn-outline-primary w-100">
                    <i class="bi bi-shop fs-4"></i>
                    <br>
                    <small>Shopping</small>
                </a>
            </div>
            <div class="col-4 col-md-3  col-lg-2 mb-2">
                <a href="/conta/<?= $URI[1]; ?>/shopping/compras" class="btn btn-outline-primary w-100">
                    <i class="bi bi-bag-heart fs-4"></i>
                    <br>
                    <small>Compras</small>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Cartões -->
<div class="row mb-4 justify-content-center">
    <div class="col-12 col-sm-12 col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Meus cartões</h5>
            <div>
                <a href="/conta/<?= $URI[1]; ?>/cartoes/novo" class="btn btn-warning btn-sm <?= (count($fConta['cartoes']) >= 2) ? 'd-none disabled' : ''; ?>"><i class="bi bi-credit-card me-1"></i> Solicitar <span class="d-none d-sm-inline-block"> Cartão</span></a>
                <a href="/conta/<?= $URI[1]; ?>/cartoes" class="btn btn-sm btn-outline-primary w-px-120"><i class="bi bi-credit-card me-1"></i> Ver todos</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (count($fConta['cartoes'])) { $CountCartoes = 0;
                foreach ($fConta['cartoes'] as $KeyC => $ViewC) { ?>
                    <div class="col-md-6 mb-3">
                        <div class="card card-hover shadow-md mpoint contaCardBox text-bg-<?= $ViewC['card_tipo_color']; ?> border-<?= $ViewC['card_tipo_color']; ?> bg-opacity-50" data-eb-cartao="<?= $ViewC['card_id']; ?>">
                            <div class="card-body p-2 ps-4">
                                <div class="row">
                                    <div class="col-9 mt-2">
                                        <h6 class="card-subtitle mb-2 text-muted fw-bold  text-shadow-sm">
                                            <span class="text-<?= $ViewC['card_tipo_color']; ?>"><?= $ViewC['card_tipo_nome']; ?></span>
                                        </h6>
                                    </div>
                                    <div class="col-3 text-end bg-opacity-100">
                                        <span class="badge-alt text-bg-<?= ($ViewC['card_ativo']) ? 'success' : 'danger'; ?>"><?= ($ViewC['card_ativo']) ? 'Ativo' : 'Bloqueado'; ?></span>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="card-title">**** **** **** <?= substr($ViewC['card_numero'], -4); ?></h5>
                                    </div>
                                    <div class="col-9">
                                        <p class="card-text mb-1">Limite disponível</p>
                                        <h6 class="fw-bold">R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', '.'); ?></h6>
                                    </div>
                                </div>
                                <i class="bi bi-credit-card-2-front fs-1 text-primary"></i>
                            </div>
                        </div>
                    </div>
                <?php if($CountCartoes++ == 1){ break; }} // Contabiliza somente os 2 primeiros cartões
            } else { ?>
                <div class="col-md-12 mb-3">
                    <div class="text-center bd-1 bd-warning shadow-md p-4 border">
                        Você não possui cartões no momento.
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Últimas Transações -->
<div class="row justify-content-center">
    <div class="col-12 col-sm-12 col-md-8 mb-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Últimas transações</h5>
            <a href="/conta/<?= $URI[1]; ?>/extrato" class="btn btn-sm btn-outline-primary w-px-120"><i class="bi bi-file-invoice me-1"></i> Ver todas</a>
        </div>
        <div class="list-group">
            <?php foreach($Conta -> getExtrato() as $ViewE){ ?>
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="bg-<?= $ViewE['ext_valor'] < 0 ? 'danger' : 'success'; ?> bg-opacity-10 p-2 rounded me-3 w-px-50 text-center">
                            <i class="bi bi-bag-<?= $ViewE['ext_valor'] < 0 ? 'dash-fill text-danger' : 'plus-fill text-success'; ?>"></i>
                        </div>
                        <div>
                            <h6 class="mb-1"><?= $ViewE['ext_info']; ?></h6>
                            <small class="text-muted"><?= Data($ViewE['ext_dref'],3); ?></small>
                        </div>
                    </div>
                    <div class="text-end align-self-center">
                        <h6 class="mb-0 text-danger">R$ <?= number_format(abs($ViewE['ext_valor']), 2, ',', '.'); ?></h6>
                        <small class="text-muted"><?= $ViewE['ext_valor'] < 0 ? 'Débito' : 'Crédito'; ?></small>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Banner Emprestimo -->
    <?php if(rand(0,1000) > 700){ ?>
    <div class="col-12 col-sm-12 col-md-8">
        <a href="/conta/<?= $URI[1]; ?>/emprestimos">
            <img src="/images/banner_emprestimo_smartphone.jpg" class="d-sm-none" style="max-width: 100%;" alt="" loading="lazy">
            <img src="/images/banner_emprestimo_widescreen.jpg" class="d-none d-sm-inline" style="max-width: 100%;" alt="" loading="lazy">
        </a>
    </div>
    <?php } ?>
</div>