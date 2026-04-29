<form action="/exe/conta/investimento" method="post">
    <div class="modal fade" id="invModalCofrinho" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">###</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="">
                    <p class="text-center">Você deseja iniciar seu investimento com qual valor?</p>
                    <div class="text-center mx-auto w-75 mt-1">
                        <input type="text" name="invModalValor" id="invModalValor" class="bd-1 bd-secondary form-control text-center MaskValor" placeholder="R$ 1,00" inputmode="numeric" autocomplete="off" required>
                        <div class="d-flex justify-content-between">
                            <small>Saldo disponível:</small>
                            <small>R$ <?= number_format($fConta['ct_saldo'], 2, ',', '.'); ?></small>
                        </div>
                    </div>
                    <div class="text-center mx-auto w-75 mt-3 collapse" id="invModalTempoDiv">
                        <input type="number" name="invModalTempo" id="invModalTempo" class="bd-1 bd-secondary form-control text-center" min="1" step="1" placeholder="Tempo" inputmode="numeric" autocomplete="off" required disabled>
                        <div class="text-start">
                            <div class="small">Tempo de aplicação do investimento, em meses.</div>
                            <div class="small" id="invModelTempoInfo"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-cash-coin me-1"></i> Confirmar</button>
                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                    <input type="hidden" name="invModalTipo" id="invModalTipo" value="1">
                    <?= Token(); ?>
                </div>
            </div>
        </div>
    </div>
</form>