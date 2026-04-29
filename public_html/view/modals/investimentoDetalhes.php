<form action="/upg/conta/investimento/detalhes/adicionar" method="post">
    <div class="modal fade" id="invModalDetalhes" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-success">
                    <span class="modal-title"><i class="bi bi-cash me-1"></i> Adicionar Valor</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="">
                    <?php if($fConta['ct_saldo'] >= 1){ ?>
                    <p class="text-center">Qual valor você deseja adicionar?</p>
                    <div class="text-center mx-auto w-75 mt-1">
                        <input type="number" step="1" name="invModalDetalhesValor" min="1" max="<?= number_format($fConta['ct_saldo'], 2); ?>" id="invModalDetalhesValor" class="form-control text-center" placeholder="R$ 1,00" inputmode="numeric" autocomplete="off" required>
                        <div class="d-flex justify-content-between">
                            <small>Saldo disponível:</small>
                            <small>R$ <?= number_format($fConta['ct_saldo'], 2, ',', '.'); ?></small>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="w-100  text-center">
                        <span class="text-danger fw-bold">Saldo insuficiente.</span>
                        <br>
                        <small>Valor mínimo é de R$ 1,00. Saldo disponível: R$ <?= number_format($fConta['ct_saldo'], 2, ',', '.'); ?></small>
                    </div>
                    <?php } ?>
                </div>
                <?php if($fConta['ct_saldo'] >= 1){ ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-cash-coin me-1"></i> Confirmar</button>
                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                    <input type="hidden" name="invModalDetalhesID" value="<?= $URI[3]; ?>">
                    <?= Token(); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</form>

<form action="/upg/conta/investimento/detalhes/retirar" method="post">
    <div class="modal fade" id="invModalDetalhesRetirar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-secondary">
                    <span class="modal-title"><i class="bi bi-cash me-1"></i> Adicionar Valor</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="">
                    <p class="text-center">Qual valor você deseja retirar?</p>
                    <div class="text-center mx-auto w-75 mt-1">
                        <input type="number" step="0.01" name="invModalDetalhesValor" min="0.01" max="<?= number_format($Inv['inv_saldo'], 2); ?>" id="invModalDetalhesValor" class="form-control text-center" placeholder="R$ 1,00" inputmode="numeric" autocomplete="off" required>
                        <div class="d-flex justify-content-between">
                            <small>Saldo disponível:</small>
                            <small>R$ <?= number_format($Inv['inv_saldo'], 2, ',', '.'); ?></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-cash-coin me-1"></i> Confirmar</button>
                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                    <input type="hidden" name="invModalDetalhesID" value="<?= $URI[3]; ?>">
                    <?= Token(); ?>
                </div>
            </div>
        </div>
    </div>
</form>