<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="infomain bd-1 bd-info mb-2 shadow-md">
            <i class="bi bi-bag-heart me-1"></i> Meus itens comprados no shopping.
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <div class="row">
            <?php foreach($Itens as $KeyI=>$ViewI){ ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card shadow-md mb-2">
                    <div class="card-body">
                        <h6 class="text-center"><?= $ViewI['cts_item']['title']; ?></h6>
                        <div class="d-flex align-items-center justify-content-center flex-grow-1" style="min-height: 150px;">
                            <img src="<?= $ViewI['cts_item']['thumbnail']; ?>" loading="lazy" class="imageShop" style=" max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <span class="ft-10">R$</span>
                                <span class="fw-bold ft-16"><?= number_format($ViewI['cts_item']['price'] * $Shop->Dolar, 2, ',', '.'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>