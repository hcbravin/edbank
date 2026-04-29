<form action="/exe/conta/transferencia" method="post">
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            
            <div class="row">
                <div class="col-8"><div class="infomain bd-1 bd-success shadow-sm"><i class="bi bi-arrow-up-circle me-1"></i> Transferir</div></div>
                <div class="col-4 text-end">
                    <a href="/conta/<?=$URI[1];?>/pix" class="btn btn-sm btn-verpsc w-px-100"><i class="bi bi-x-diamond-fill me-1"></i> Pix</a>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-12 mb-2">
                    <div class="infomain bd-1 bd-primary shadow-sm">
                        <span class="me-1">Destinatário:</span> <i class="bi bi-person"></i> <strong id="contaTransferirDestinatario"></strong>
                    </div>
                </div>

                <div class="col-8 col-sm-4 col-md-3 mb-2">
                    <div class="form-group">
                        <label for="" class="main"><i class="bi bi-bank me-1"></i> AGÊNCIA</label>
                        <input type="number" name="contaTransferirAgencia" id="contaTransferirAgencia" step="1" min="1" class="form-control form-control-sm text-center" placeholder="Ex: 5 ou 00005">
                    </div>
                </div>
                <div class="col-8 col-sm-4 col-md-3 mb-2">
                    <div class="form-group">
                        <label for="" class="main"><i class="bi bi-person me-1"></i> CONTA</label>
                        <input type="number" name="contaTransferirConta" id="contaTransferirConta" step="1" min="1" maxlength="5" class="form-control form-control-sm text-center" placeholder="Sem dígito verificador">
                    </div>
                </div>
                <div class="col-8 col-sm-4 col-md-3 mb-2">
                    <div class="form-group">
                        <label for="" class="main"><i class="bi bi-currency-dollar me-1"></i> VALOR</label>
                        <input type="text" name="contaTransferirValor" id="contaTransferirValor" class="form-control form-control-sm text-center" placeholder="0,00" inputmode="decimal" pattern="[0-9.,]*" placeholder="0,00" autocomplete="off" data-type="currency">
                    </div>
                </div>
                <div class="col-8 col-sm-4 col-md-3 mb-2 align-self-end">
                    <button class="btn btn-sm btn-success w-100" disabled type="submit" data-eb-saldo="<?= number_format($fConta['ct_saldo'],2,',',''); ?>" id="contaTrasferirButton"><i class="bi bi-arrow-up-circle me-1"></i> Transferir</button>
                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                    <?= Token(); ?>
                </div>

                <div class="col-12 mt-4 mb-0">
                    <div class="infomain bd-1 bd-secondary shadow-sm mb-0">
                        Aqui você poderá realizar transações financeiras com base nos seus fundos para outras contas, seja da mesma agência ou de outras agências. O valor será descontado de sua conta (caso haja saldo) e enviado para a conta de destino. Para isso, preencha os campos abaixo.
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>