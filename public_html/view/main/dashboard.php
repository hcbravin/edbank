<div class="row justify-content-center mt-3">
    <!-- Infomrativo -->
     <div class="col-12 col-md-10 col-lg-8 mb-2">
        <div class="infomain bd-1 bd-info shadow-md">
            Escolha qual função você deseja acessar.
        </div>
     </div>
</div>
<div class="row justify-content-center mt-1">
    <!-- Gerencia de Contas -->
    <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <div class="card shadow-md">
            <div class="card-header p-2">
                <div class="d-flex justify-content-between">
                    <span><i class="bi bi-bank me-1"></i> Minhas Gerencias</span>
                    <span class="badge text-bg-info px-3 align-self-center"><?= count($MS['gerente']); ?></span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="list-group">
                    <?php foreach ($MS['gerente'] as $KeyG => $ViewG) { ?>
                    <a href="/gerencia/<?= $KeyG; ?>" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-8 align-self-center">
                                <span class="badge fw-normal text-bg-secondary"><?= Data($ViewG['ag_dref'],'ano'); ?></span>
                                <br>
                                <span class="badge fw-normal text-bg-info"><?= $ViewG['ag_dias']; ?> Dias</span>
                            </div>
                            <div class="col-4 text-end">
                                <div class=""><i class="bi bi-bank me-2"></i> <?= ZeroEsquerda($ViewG['ag_num']); ?></div>
                                <small class="ft-8 text-uppercase"><?= $ViewG['ag_info']; ?></small>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Minhas Contas -->
    <div class="col-12 col-sm-6 col-md-5 col-lg-4 mt-2 mt-sm-0">
        <div class="card shadow-md">
            <div class="card-header p-2">
                <div class="d-flex justify-content-between">
                    <span><i class="bi bi-person-square me-1"></i> Minhas Contas</span>
                    <span class="badge text-bg-warning px-3 align-self-center"><?= count($MS['contas']); ?></span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="list-group">
                    <?php foreach ($MS['contas'] as $KeyC => $ViewC) { ?>
                    <a href="/conta/<?= $KeyC; ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <i class="bi bi-bank me-1"></i> <?= ZeroEsquerda($ViewC['ag_num']); ?>
                                <i class="bi bi-person-square ms-2 me-1"></i> <?= $ViewC['ct_conta'] . ' - ' . $ViewC['ct_digito'];?>
                            </div>
                            <div class="text-end">
                                R$ <?= number_format($ViewC['ct_saldo'],2,',','.'); ?>
                            </div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>