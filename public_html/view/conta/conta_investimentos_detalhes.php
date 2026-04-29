<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="mb-2 shadow-md investimentos-header rounded p-2" style="background-image: url('/images/<?= $Inv['inv_tipo_info']['img']; ?>');">
            <span class="fw-bold py-1 px-3 rounded ft-26 text-bg-warning w-25 shadow-md"><?= $Inv['inv_info']; ?></span>
        </div>
        <div class="row justify-content-center">

            <div class="col-12 col-sm-6 mb-2">
                <div class="card shadow-md">
                    <div class="card-body p-1 text-center">
                        <span class="badge-alt w-100 text-bg-success">Rendimentos</span>
                        <hr class="my-1">
                        <h1 class="text-center fw-bold text-success"><span class="ft-9">R$</span> <?= number_format($Inv['inv_saldo_valor'],2,',','.'); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-3 mb-2 align-self-center text-center">
                <button type="button" class="w-100 btn btn-success px-4" data-bs-target="#invModalDetalhes" data-bs-toggle="modal">
                    <i class="bi bi-cash-coin fs-3"></i>
                    <br>Adicionar Valor
                </button>
            </div>
            <?php if($Inv['inv_meses'] >= $Inv['inv_periodo']){ ?>
            <div class="col-6 col-sm-3 mb-2 align-self-center text-center">
                <button type="button" class="w-100 btn btn-outline-danger ms-2 px-4" data-bs-target="#invModalDetalhesRetirar" data-bs-toggle="modal">
                    <i class="bi bi-cash-stack fs-3"></i>
                    <br>Realizar Retirada
                </button>
            </div>
            <?php } ?>

            <div class="col-12 col-sm-<?= ($Inv['inv_meses'] >= $Inv['inv_periodo']) ? '6' : '9'; ?> mb-2">
                <ul class="list-group shadow-md ft-10">
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-cash-coin me-1"></i> Saldo Total:</span> <span class="fw-bold">R$ <?= number_format($Inv['inv_saldo'],2,',','.'); ?></span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-graph-up-arrow me-1"></i> Taxa Referência:</span> <span class="fw-bold"><?= $Inv['inv_tipo_info']['taxa']; ?>% <?= $Inv['inv_tipo_info']['cdi'] ? 'do CDI' : ''; ?> <?= $Inv['inv_tipo_info']['taxaPeriodo']; ?></span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-graph-up-arrow me-1"></i> Taxa Real:</span> <span class="fw-bold"><?= $Inv['inv_tipo_info']['taxaReal']; ?>% <?= $Inv['inv_tipo_info']['cdi'] ? 'do CDI' : ''; ?> a.m.</span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-graph-down-arrow me-1"></i> Taxa Administrativa:</span> <span class="fw-bold"><?= $Inv['inv_tipo_info']['administracao']; ?>% </span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-calendar-week me-1"></i> Período:</span> <span class="fw-bold"><?= $Inv['inv_tipo_info']['periodo']; ?> meses</span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-cash me-1"></i> Capital Investido:</span> <span class="fw-bold">R$ <?= number_format($Inv['inv_capital'],2,',','.'); ?></span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-currency-exchange me-1"></i> Risco:</span> <span class="fw-bold"><?=$Inv['inv_tipo_info']['riscoInfo']; ?></span>
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <span><i class="bi bi-shield-lock-fill me-1"></i> Proteção FGC:</span> <span class="fw-bold"><?= $Inv['inv_tipo_info']['fgc'] ? 'Sim' : 'Não'; ?></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>