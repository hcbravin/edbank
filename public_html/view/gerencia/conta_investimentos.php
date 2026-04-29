<?php foreach($Conta['investimentos'] as $KeyI => $ViewI){ ?>
<div class="row justify-content-center mb-3">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="mb-2 shadow-md investimentos-header rounded p-2" style="background-image: url('/images/<?= $ViewI['inv_tipo_info']['img']; ?>'); background-color: rgba(255, 255, 255, 0.6); background-blend-mode: lighten;">
            <div class="d-flex justify-content-between text-center">
                <span class="fw-bold py-1 px-3 rounded text-bg-warning w-25 shadow-md"><?= $ViewI['inv_info']; ?></span>
                <span class="fw-bold py-1 px-3 rounded text-bg-<?= $ViewI['inv_ativo'] ? 'success' : 'danger'; ?> shadow-md"><?= $ViewI['inv_ativo'] ? 'Ativo' : 'Inativo'; ?></span>
            </div>
            <div class="row mt-1">
                <div class="col-12 col-sm-6 mb-2">
                    <div class="card shadow-md">
                        <div class="card-body p-1 text-center">
                            <span class="badge-alt w-100 text-bg-success">Rendimentos</span>
                            <hr class="my-1">
                            <h1 class="text-center fw-bold text-success"><span class="ft-9">R$</span> <?= number_format($ViewI['inv_saldo'] - $ViewI['inv_capital'],2,',','.'); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 mb-2">
                    <ul class="list-group shadow-md ft-10">
                        <li class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <span><i class="bi bi-calendar-week me-1"></i> Período:</span> <span class="fw-bold"><?= $ViewI['inv_tipo_info']['periodo']; ?> meses</span>
                            </div>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <span><i class="bi bi-cash me-1"></i> Capital Investido:</span> <span class="fw-bold">R$ <?= number_format($ViewI['inv_capital'],2,',','.'); ?></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>