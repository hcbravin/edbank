<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8 mb-2">
        <div class="d-flex justify-content-between">
            <button class="btn btn-sm btn-danger align-self-center" data-eb-rmv="upg/conta/cartao/cancelar/<?= $URI[1]; ?>/<?= $URI[3]; ?>" type="button"><i class="bi bi-ban align-self-center me-1"></i> Cancelar Cartão</button>
            <a href="/conta/<?= $URI[1]; ?>/cartoes" class="btn btn-warning btn-sm w-px-150"><i class="bi bi-credit-card-2-front-fill me-1"></i> Todos os Cartões</a>
        </div>


        <div class="infomain my-2 fw-bold shadow-md bd-1 bd-<?= $ViewC['card_tipo_color']; ?>">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <i class="bi bi-credit-card me-1"></i> Fatura do seu cartão <span class="badge text-bg-<?= $ViewC['card_tipo_color']; ?> text-uppercase"><?= $ViewC['card_tipo_nome']; ?></span>
                </div>
                <div class="col-12 col-sm-6 text-end mt-2 mt-sm-0">
                    ●●●● ●●●● ●●●● <?= substr($ViewC['card_numero'], -4); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8 mb-3">
        <div class="infomain p-3 shadow-md">
            <div class="d-flex justify-content-between">
                Limite disponível: <span class="fw-bold">R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', '.'); ?></span>
            </div>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" aria-label="Usado" style="width: <?= 100 - $ViewCBar; ?>%" aria-valuenow="<?= 100 - $ViewCBar; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" aria-label="Disponível" style="width: <?= $ViewCBar; ?>%" aria-valuenow="<?= $ViewCBar; ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8">
        <div class="accordion" id="FaturasAccordion">
            <?php foreach ($Faturas as $KeyF => $ViewF) { ?>
                <div class="accordion-item">
                    <span class="accordion-header" id="Fatura<?= $KeyF; ?>">
                        <button class="accordion-button py-2 <?= $KeyF == 0 ? '':'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#FaturaCollapse<?= $KeyF; ?>" aria-expanded="<?= $KeyF == 0 ? 'true':'false'; ?>" aria-controls="FaturaCollapse<?= $KeyF; ?>">
                            Fatura de <?= (count($Faturas) - $KeyF) . '/' . count($Faturas); ?> 
                        </button>
                    </span>
                    <div id="FaturaCollapse<?= $KeyF; ?>" class="accordion-collapse collapse <?= $KeyF == 0 ? 'show':''; ?>" aria-labelledby="Fatura<?= $KeyF; ?>" data-bs-parent="#FaturasAccordion">
                        <div class="accordion-body">
                            <div class="d-flex justify-content-between">
                                <div class="btn-group">
                                    <span class="btn btn-sm btn-secondary">Valor</span>
                                    <span class="btn btn-sm btn-primary">R$ <?= number_format($ViewF['ctf_valor'], 2, ',', '.') ?></span>
                                </div>
                                <div class="btn-group">
                                    <span class="btn btn-sm btn-secondary">Pago</span>
                                    <span class="btn btn-sm btn-warning">R$ <?= number_format($ViewF['ctf_pagamento'], 2, ',', '.') ?></span>
                                </div>
                            </div>

                            <ol class="list-group list-group-striped mt-2 small">
                                <?php foreach(@json_decode($ViewF['ctf_fatura'],true)['itens'] as $Item){ ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= $Item['item']; ?></span>
                                    <span>R$ <?= number_format($Item['valor'], 2, ',', '.'); ?></span>
                                </li>
                                <?php } ?>
                            </ol>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="col-12 col-md-10 col-lg-8 ft-8">
        A resilição contratual do cartão de crédito não implica renúncia ao direito de crédito da instituição financeira quanto aos valores já utilizados e registrados em fatura, cuja quitação permanece exigível. Eventuais encargos moratórios ou compensatórios poderão ser lançados em razão da descontinuidade do período de fruição da anuidade, conforme previsão no instrumento particular de adesão.
    </div>

</div>