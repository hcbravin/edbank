<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-lg-8">
        <div class="ft-10 mb-2">
            Defina o valore abaixo para iniciar o PicToPay
        </div>

        <div class="card shadow-md mb-2">
            <div class="card-header text-bg-primary">
                <i class="bi bi-credit-card-2-back-fill me-1"></i> Pic to Pay
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-3 mb-2 mb-md-0">
                        <label for="PicToPayMainValor">R$ VALOR</label>
                        <input type="text" class="form-control form-control-sm text-center MaskValor" inputmode="numeric" id="PicToPayMainValor" placeholder="R$ 0.00" data-eb-maxValue="<?= $AgenciaConfig['gerenteMaxCash']; ?>">
                        <div class="ft-10 mb-2 <?= (!$AgenciaConfig['gerenteMaxCash']) ? 'd-none' : ''; ?>" id="PicToPayMainValorMaxCash">
                            <span class="badge mx-0 text-bg-primary rounded-0 rounded-start">Máximo</span>
                            <span class="badge mx-0 text-bg-warning rounded-0 rounded-end">R$ <?= number_format($AgenciaConfig['gerenteMaxCash'], 2, ',', '.'); ?></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-2 align-self-start">

                        <span class="ft-10">OPERAÇÃO</span>
                        <div>
                            <input type="radio" class="btn-check PicToPayMainType" name="pictopaymaintype" id="PicToPayMainType1" autocomplete="off" value="1" checked>
                            <label class="btn btn-sm btn-outline-success w-49" data-eb-color="success" for="PicToPayMainType1"><i class="bi bi-file-arrow-up me-1"></i> Creditar</label>

                            <input type="radio" class="btn-check PicToPayMainType" name="pictopaymaintype" id="PicToPayMainType0" autocomplete="off" value="0">
                            <label class="btn btn-sm btn-outline-danger w-49" data-eb-color="danger" for="PicToPayMainType0"><i class="bi bi-file-arrow-down me-1"></i> Debitar</label>
                        </div>

                    </div>
                    <div class="col-12 col-md-12 col-lg-7 mb-2 align-self-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="PicToPayMainBreak" value="1" checked>
                            <label class="form-check-label" for="PicToPayMainBreak">Debitar mesmo sem saldo</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7 mt-5 mt-sm-0 align-self-end text-end">
                        <button class="btn btn-sm btn-primary" id="PicToPayMainStart">
                            <i class="bi bi-credit-card-2-back-fill me-1"></i> Pic to Pay
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="infomain bd-1 bd-primary shadow-md">
            O código de autorização da operação é <strong id="PicToPayMainCodeShow"></strong>. Atualize a página para obter um novo código.
        </div>
    </div>
</div>