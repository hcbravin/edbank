<ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php foreach ($Conta['cartoes'] as $KeyC => $ViewC) { ?>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?= $MinCardKey == $KeyC ? 'active' : ''; ?>" id="card-<?= $KeyC; ?>-tab" data-bs-toggle="tab" data-bs-target="#card-<?= $KeyC; ?>-tab-pane" type="button" role="tab" aria-controls="card-<?= $KeyC; ?>-tab-pane" aria-selected="<?= $MinCardKey == $KeyC ? 'true' : 'false'; ?>"><span class="rounded-1 py-1 badge text-bg-<?= $ViewC['card_tipo_color']; ?>"><?= $ViewC['card_tipo_nome']; ?></span> <i class="mx-1 bi bi-credit-card"></i> <?= substr($ViewC['card_numero'], -4); ?></button>
        </li>
    <?php } ?>
</ul>
<div class="tab-content" id="myTabContent">
    <?php foreach ($Conta['cartoes'] as $KeyC => $ViewC) { ?>
        <div class="tab-pane fade <?= $MinCardKey == $KeyC ? 'show active' : ''; ?>" id="card-<?= $KeyC; ?>-tab-pane" role="tabpanel" aria-labelledby="card-<?= $KeyC; ?>-tab" tabindex="0">

            <div class="row justify-content-center mt-3">
                <div class="col-12 col-sm-10 col-md-8">
                    <div class="card mb-2">
                        <div class="card-body py-1">
                            <div class="row">
                                <div class="col">
                                    <div class="text-muted small">Cartão</div>
                                    <div class="fw-bold">
                                        <?= $ViewC['card_tipo_nome']; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-muted small">Número</div>
                                    <div class="fw-bold">
                                        <small class="ft-8">●●●● ●●●● ●●●● </small><span class="ft-14"><?= substr($ViewC['card_numero'], -4); ?></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-muted small">Validade</div>
                                    <div class="fw-bold">
                                        <?= date('m/y', strtotime($ViewC['card_validade'])); ?>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-1">
                            <div class="row">
                                <div class="col">
                                    <div class="text-muted small">Fatura Atual</div>
                                    <div class="fw-bold">
                                        <small class="ft-8">R$</small> <span class="ft-14"><?= number_format($ViewC['card_fatura_valor'], 2, ',', '.') ?></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-muted small">Limite Total</div>
                                    <div class="fw-bold">
                                        <small class="ft-8">R$</small> <span class="ft-14"><?= number_format($ViewC['card_limite'], 2, ',', '.') ?></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text-muted small">Limite Livre</div>
                                    <div class="fw-bold">
                                        <small class="ft-8">R$</small> <span class="ft-14"><?= number_format($ViewC['card_limite_livre'], 2, ',', '.') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="accordionCard<?= $KeyC; ?>">
                        <?php foreach ($ViewC['card_fatura_view'] as $KeyF => $ViewF) { ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionElement<?= $KeyF; ?>">
                                    <button class="accordion-button <?= $KeyF == 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#accordionCollapse<?= $KeyF; ?>" aria-expanded="true" aria-controls="accordionCollapse<?= $KeyF; ?>">
                                        Fatura de <?= (count($ViewC['card_fatura_view']) - $KeyF) . '/' . count($ViewC['card_fatura_view']); ?>
                                    </button>
                                </h2>
                                <div id="accordionCollapse<?= $KeyF; ?>" class="accordion-collapse collapse <?= $KeyF == 0 ? 'show' : ''; ?>" aria-labelledby="accordionElement<?= $KeyF; ?>" data-bs-parent="#accordionCard<?= $KeyC; ?>">
                                    <div class="accordion-body">
                                        <ol class="list-group list-group-striped mt-2 small">
                                            <?php foreach ($ViewF['ctf_fatura']['itens'] as $KeyI => $ViewI) { ?>
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span><?= $ViewI['item']; ?></span>
                                                    <span>R$ <?= number_format($ViewI['valor'], 2, ',', '.'); ?></span>
                                                </li>
                                            <?php } ?>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>
    <?php } ?>
</div>