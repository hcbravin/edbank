<div class="modal" tabindex="-1" id="ModalCartoesPagar">
    <form action="/exe/conta/cartao/pagar" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-bg-success">
                    <span class="modal-title"><i class="bi bi-credit-card me-1"></i> Pagar Cartão</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="">
                    <ul class="list-group mt-1 ft-10">

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Saldo em conta</span>
                            <span>R$ <?= number_format($fConta['ct_saldo'], 2, ',', '.'); ?></span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <div><span class="badge text-bg-secondary" id="ModalCartoesPagarTipo">Tipo</span></div>
                            <div>
                                ●●●● ●●●● ●●●● <span id="ModalCartoesPagarFinal">0000</span>
                            </div>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Fatura</span>
                            <span id="ModalCartoesPagarFatura">R$ 0,00</span>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Vencimento</span>
                            <span id="ModalCartoesPagarVencimento">15/00</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="align-self-center">Valor a ser pago</span>
                            <input type="number" class="form-control form-control-sm w-px-150 text-center" step="0.01" min="0.01" max="<?= number_format($fConta['ct_saldo'], 2, '.', ''); ?>" name="ModalCartoesPagarValor" id="ModalCartoesPagarValor" required="required">
                        </li>

                    </ul>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success btn-sm" id="ModalCartoesPagarSubmit"><i class="bi bi-cash-coin me-1"></i> Confirmar</button>
                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                    <input type="hidden" name="card" id="ModalCartoesPagarID" value="" required>
                    <?= Token(); ?>
                </div>
            </div>
        </div>
    </form>
</div>