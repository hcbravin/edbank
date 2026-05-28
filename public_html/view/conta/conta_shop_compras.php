<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="infomain bd-1 bd-info mb-2 shadow-md">
            <i class="bi bi-bag-heart me-1"></i> Meus itens comprados no shopping.
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <div class="row">
            <?php foreach ($Itens as $KeyI => $ViewI) { ?>
                <div class="col-12 col-md-6">
                    <div class="card shadow-md mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="text-center text-sm-start border-bottom"><?= $ViewI['cts_item']['title']; ?></h6>
                                </div>
                                <div class="col-12 col-sm-5 mb-2 mb-sm-0">
                                    <div class="d-flex align-items-center justify-content-center flex-grow-1" style="min-height: 150px;">
                                        <img src="<?= $ViewI['cts_item']['thumbnail']; ?>" loading="lazy" class="imageShop" style=" max-width: 100%; object-fit: contain;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-7">
                                    <ul class="list-group ft-9">
                                        <li class="py-1 list-group-item d-flex justify-content-between">
                                            <span>Unidade</span>
                                            <span>R$ <?= number_format($ViewI['cts_item']['price_unity'], 2, ',', '.'); ?></span>
                                        </li>
                                        <li class="py-1 list-group-item d-flex justify-content-between">
                                            <span>Quantidade</span>
                                            <span><?= $ViewI['cts_item']['stock']; ?></span>
                                        </li>
                                        <li class="py-1 list-group-item d-flex justify-content-between">
                                            <span>Total</span>
                                            <span>R$ <?= number_format($ViewI['cts_item']['price'], 2, ',', '.'); ?></span>
                                        </li>
                                        <li class="py-1 list-group-item d-flex justify-content-between">
                                            <span><?= date('d/m/Y', strtotime($ViewI['cts_dref'])); ?></span>
                                            <span><?= date('H:i:s', strtotime($ViewI['cts_dref'])); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>