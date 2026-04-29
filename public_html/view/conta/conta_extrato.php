<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 <?= $URI[0] == 'gerencia' ? 'd-none' : ''; ?>">
        <div class="infomain bd-1 bd-primary shadow-md mb-2">
            <i class="bi bi-file-earmark-text me-1"></i> Extrato
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <?php if(count($Extrato)){ ?>
        <div class="accordion" id="ExtratoAccordion">
            <?php foreach ($Extrato as $KeyC => $ViewC) { ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="ExtratoHeader<?=$KeyC;?>">
                        <button class="accordion-button <?= $KeyC == 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#Extrato<?=$KeyC;?>" aria-expanded="<?= $KeyC == 0 ? 'true' : 'false'; ?>" aria-controls="Extrato<?=$KeyC;?>">
                            Ciclo <?= count($Extrato) - $KeyC; ?>/<?= count($Extrato); ?>
                        </button>
                    </h2>
                    <div id="Extrato<?=$KeyC;?>" class="accordion-collapse collapse <?= $KeyC == 0 ? 'show' : ''; ?>" aria-labelledby="ExtratoHeader<?=$KeyC;?>" data-bs-parent="#ExtratoAccordion">
                        <div class="accordion-body p-0">
                            <ol class="list-group rounded-top-0">
                                <?php foreach ($ViewC as $ViewE) { ?>
                                    <div class="list-group-item list-group-item-action  border-start-0 border-end-0">
                                        <div class="d-flex w-100 justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-<?= $ViewE['ext_valor'] < 0 ? 'danger' : 'success'; ?> bg-opacity-10 p-2 rounded me-3 w-px-50 text-center">
                                                    <i class="bi bi-bag-<?= $ViewE['ext_valor'] < 0 ? 'dash-fill text-danger' : 'plus-fill text-success'; ?>"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1"><?= $ViewE['ext_info']; ?></h6>
                                                    <small class="text-muted"><?= Data($ViewE['ext_dref'], 3); ?></small>
                                                </div>
                                            </div>
                                            <div class="text-end align-self-center">
                                                <h6 class="mb-0 text-danger">R$ <?= number_format(abs($ViewE['ext_valor']), 2, ',', '.'); ?></h6>
                                                <small class="text-muted"><?= $ViewE['ext_valor'] < 0 ? 'Débito' : 'Crédito'; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </ol>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php } else { alert('Nenhuma movimentação financeira encontrada.'); } ?>
    </div>
</div>