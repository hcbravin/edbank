<div class="row">
    <!-- Saldo -->
    <div class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card shadow-md">
            <div class="card-body py-0">
                <small class="ft-10"><i class="bi bi-cash me-1"></i> SALDO</small>
                <p class="text-center ft-18 fw-bold text-<?= $Conta['ct_saldo'] > 0 ? 'success' : 'danger'; ?>">
                    <small class="ft-8">R$</small> <?= number_format($Conta['ct_saldo'], 2, ',', '.'); ?>
                </p>
            </div>
        </div>

        <div class="text-end mt-1">
            <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>/extrato" class="btn py-0 ft-9 fw-bold btn-secondary">Ver Extrato</a>
        </div>
    </div>
    <!-- Cartão -->
    <div class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card shadow-md">
            <div class="card-body py-0">
                <small class="ft-10"><i class="bi bi-file-earmark-text me-1"></i> FATURA CARTÃO</small>
                <p class="text-center text-danger ft-18 fw-bold">
                    <small class="ft-8">R$</small> <?= number_format($Conta['cartoesValor'], 2, ',', '.'); ?>
                </p>
            </div>
        </div>
        <div class="text-end mt-1">
            <span class="badge text-bg-warning">Cartões &nbsp; <?= count($Conta['cartoes']); ?></span>
            <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>/cartoes" class="btn py-0 ft-9 fw-bold btn-secondary <?= count($Conta['cartoes']) == 0 ? 'disabled' : ''; ?>">Abrir</a>
        </div>
    </div>
    <!-- Investimentos -->
    <div class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card shadow-md">
            <div class="card-body py-0">
                <small class="ft-10"><i class="bi bi-pie-chart me-1"></i> INVESTIMENTOS</small>
                <p class="text-center text-primary ft-18 fw-bold">
                    <small class="ft-8">R$</small> <?= number_format($Conta['investimentosValor'], 2, ',', '.'); ?>
                </p>
            </div>
        </div>
        <div class="text-end mt-1">
            <span class="badge text-bg-primary">Total &nbsp; <?= count($Conta['investimentos']); ?></span>
            <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>/investimentos" class="btn py-0 ft-9 fw-bold btn-secondary <?= count($Conta['investimentos']) == 0 ? 'disabled' : ''; ?>">Abrir</a>
        </div>
    </div>
    <!-- Pendências de pagamentos -->
    <div class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card shadow-md">
            <div class="card-body py-0">
                <small class="ft-10"><i class="bi bi-hourglass-top me-1"></i> PENDÊNCIAS</small>
                <p class="text-center ft-18 fw-bold">
                    <?= (isset($Conta['pendencias']['total']) ? $Conta['pendencias']['total'] : 0); ?>
                </p>
            </div>
        </div>
        <div class="text-end mt-1">
            <span class="badge text-bg-danger">R$ &nbsp; <?= number_format($Conta['pendencias']['valor'],2,',','.'); ?></span>
            <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>/pendencias" class="btn py-0 ft-9 fw-bold btn-secondary">Abrir</a>
        </div>
    </div>
    <!-- Itens comprados -->
    <div class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card shadow-md">
            <div class="card-body py-0">
                <small class="ft-10"><i class="bi bi-cart me-1"></i> SHOP</small>
                <p class="text-center ft-18 fw-bold text-success">
                    <?= (isset($Conta['shop']['total']) ? $Conta['shop']['total'] : 0); ?>
                </p>
            </div>
        </div>
        <div class="text-end mt-1">
            <span class="badge text-bg-success">R$ &nbsp; <?= @ number_format($Conta['shop']['valor'],2,',','.'); ?></span>
            <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>/shop" class="btn py-0 ft-9 fw-bold btn-secondary">Abrir</a>
        </div>
    </div>
</div>
<hr>
<div class="row justify-content-center mt-4">
    <div class="col-12 col-sm-6">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Últimas transações</h5>
            <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>/extrato" class="btn btn-sm btn-outline-primary w-px-120"><i class="bi bi-file-invoice me-1"></i> Ver todas</a>
        </div>
        <div class="list-group">
            <?php foreach($Conta['extrato'] as $ViewE){ ?>
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
</div>