<form action="/exe/conta/pagamento" method="post" id="pagarContaForm" data-eb-saldo="<?= $fConta['ct_saldo']; ?>">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8">

            <div class="infomain bd-1 bd-primary mb-2 shadow-md">
                <i class="bi bi-trophy-fill text-warning me-1"></i> Contas a Pagar
            </div>

            <?php if (count($ContasAbertas)) { ?>
                <ol class="list-group shadow-md mb-3">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 mb-2 mb-sm-0 align-self-center">
                                <div class="ft-14 fw-bold" id="pagarContaSomaColor">R$ <span id="pagarContaSoma">0,00</span></div>
                                <div class="ft-8 small text-uppercase">Valor Total a pagar</div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-8 align-self-center">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-1 mb-lg-0">
                                        <label class="form-label mb-0">FORMA DE PAGAMENTO</label>
                                        <select name="pagamento[forma]" class="form-select form-select-sm" id="pagarContaForma" required>
                                            <option value=""></option>
                                            <option value="0" data-eb-saldo="<?= $fConta['ct_saldo']; ?>" selected>Saldo em Conta</option>
                                            <?php foreach ($fConta['cartoes'] as $KeyC => $ViewC) { ?>
                                                <option value="<?= $KeyC; ?>" data-eb-saldo="<?= $ViewC['card_limite_livre']; ?>">Cartão <?= $ViewC['card_tipo_nome']; ?> | Limite R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', ''); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-6 offset-6 col-lg-4 offset-lg-0 text-end text-sm-start align-self-end">
                                        <button type="submit" class="btn btn-sm btn-primary w-100" id="pagarContaSubmit">
                                            <i class="bi bi-cash-coin me-1"></i> Pagar Selecionadas
                                        </button>
                                        <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                                        <?= Token(); ?>
                                    </div>
                                </div>
                            </div>
                    </li>

                    <?php foreach ($ContasAbertas as $KeyC => $ViewC) {
                        foreach ($ViewC['ctp_contas'] as $KeyI => $ViewI) { if($ViewI['pago'] == 0){ ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto align-self-center">
                                    <div class="form-check">
                                        <input name="pagamento[<?= $KeyC; ?>][<?= $KeyI; ?>]" class="form-check-input pagarContaCheckbox" type="checkbox" id="pagarConta<?= $KeyC . $KeyI; ?>" value="<?= $ViewI['valor']; ?>">
                                        <label class="form-check-label fw-bold ft-12" for="pagarConta<?= $KeyC . $KeyI; ?>"><?= $ViewI['nome']; ?></label>
                                    </div>
                                    <span class="text-muted small"><?= ($ViewI['juros']) ? $ViewI['juros'] . '% a.m.' : 'Sem juros.'; ?></span>
                                </div>
                                <div class="text-end w-px-150 align-self-center">
                                    <div class="badge mb-1 bg-<?= $ViewI['valor'] > $fConta['ct_saldo'] ? 'danger' : 'primary';  ?> rounded">R$ <?= number_format($ViewI['valor'], 2, ',', '.'); ?></div>
                                    <br>
                                    <?php if ($ViewI['valor'] > $fConta['ct_saldo']) { ?>
                                        <span class="text-danger small pagarContaInfoSaldo">Saldo Insuficiente.</span>
                                    <?php } ?>
                                    <span class="opacity-50 text-muted small d-none pagarContaInfoCartao">+5% taxa do cartão.</span>
                                </div>
                            </li>
                    <?php }}
                    } ?>
                </ol>
            <?php }else{ alert('Nenhum conta em aberto encontrada!', 'success'); } ?>
        </div>
    </div>
</form>