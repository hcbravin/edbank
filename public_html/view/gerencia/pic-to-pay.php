<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-lg-8">
        <div class="ft-10 mb-2">
            Defina os valores abaixo para iniciar o PicToPay
        </div>


        <div class="card shadow-md">
            <div class="card-header text-bg-primary">
                <i class="bi bi-credit-card-2-back-fill me-1"></i> Pic to Pay
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-3 mb-2 mb-md-0">
                        <label for="PicToPayMainValor">R$ VALOR</label>
                        <input type="number" class="form-control form-control-sm text-center" id="PicToPayMainValor" placeholder="0.00">
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-2 mb-md-0 align-self-end">

                        <span class="ft-10">OPERAÇÃO</span>
                        <div>
                        
                            <input type="radio" class="btn-check PicToPayMainType" name="options" id="PicToPayMainType1" autocomplete="off" value="1" checked>
                            <label class="btn btn-sm btn-outline-success w-49" data-eb-color="success" for="PicToPayMainType1"><i class="bi bi-file-arrow-up me-1"></i> Creditar</label>

                            <input type="radio" class="btn-check PicToPayMainType" name="options" id="PicToPayMainType0" autocomplete="off" value="0">
                            <label class="btn btn-sm btn-outline-danger w-49" data-eb-color="danger" for="PicToPayMainType0"><i class="bi bi-file-arrow-down me-1"></i> Debitar</label>
                        </div>

                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-sm-0 align-self-end text-end text-md-start">
                        <button class="btn btn-sm btn-primary" id="PicToPayMainStart">
                            <i class="bi bi-credit-card-2-back-fill me-1"></i> Pic to Pay
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>