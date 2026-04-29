<form action="/exe/agencia/depositar/<?= $URI[1]; ?>" method="post">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8">
            <div class="card shadow-md">
                <div class="card-header text-bg-success">
                    <i class="bi bi-send-plus-fill me-1"></i> Depositar
                </div>
                <div class="card-body text-center">
                    <small>Você está prestes a retirar valor do fundo da agência para depositar na(s) conta(s) selecionada(s).</small>
                    <div class="row justify-content-center mt-2">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-1 mb-lg-0 text-start">
                            <label for="sendCashValue" class="text-bg-success text-uppercase badge mb-1">Enviar</label>
                            <input type="text" id="sendCashValue" name="sendCashValue" class="form-control text-center text-success border-success MaskValor" placeholder="R$ 0.00" autofocus>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-1 mb-lg-0 text-start">
                            <label for="sendCashValueRemove" class="text-bg-danger text-uppercase badge mb-1">Retirar</label>
                            <input type="text" id="sendCashValueRemove" name="sendCashValueRemove" class="form-control border-danger text-danger text-center MaskValor" placeholder="R$ 0.00" autofocus>
                        </div>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-2 mb-1 mb-lg-0 text-start align-self-end">
                            <button type="submit" class="btn btn-success"><i class="bi bi-send-plus-fill me-1"></i> Enviar</button>
                            <input type="hidden" name="sendCashConta" value="<?= isset($Conta) ? $Conta['ct_id'] : 'all'; ?>">
                            <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>