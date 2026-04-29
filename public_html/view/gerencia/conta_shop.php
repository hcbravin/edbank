<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <?php if (!is_array($Shop) or count($Shop) == 0) {
            alert('Esta conta não possui itens adquiridos no shopping.');
        } else { ?>
            <div class="infomain bd-1 bd-primary shadow-md mb-2"><i class="bi bi-cart me-1"></i> Itens adquiridos no Shopping</div>
            <ol class="list-group">
                <?php foreach ($Shop as $KeyS => $ViewS) { ?>
                    <li class="list-group-item d-flex justify-content-between iShopItem  bg-gfocus-hover">
                        <div class="d-flex">
                            <img src="<?= $ViewS['cts_item']['thumbnail'] ?>" alt="" width="100" class="align-self-center">
                            <div class="mx-4" class="align-self-center">
                                <div class="fw-bold"><?= $ViewS['cts_item']['title']; ?></div>
                                <div class="">
                                    <div class="btn-group">
                                        <span class="btn btn-sm btn-secondary py-0">1</span>
                                        <span class="btn btn-sm btn-light border py-0">R$ <?= number_format($ViewS['cts_item']['price_unity'], 2, ',', '.'); ?></span>
                                    </div>
                                    <br>
                                    <div class="btn-group">
                                        <span class="btn btn-sm btn-primary py-0"><?= $ViewS['cts_item']['stock']; ?></span>
                                        <span class="btn btn-sm btn-warning py-0">R$ <?= number_format($ViewS['cts_item']['price_unity'] * $ViewS['cts_item']['stock'], 2, ',', '.'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="align-self-end">
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash me-1"></i> Excluir
                            </button>
                            <button class="btn btn-sm btn-primary">
                                <i class="bi bi-cart me-1"></i> Reduzir
                            </button>
                        </div>
                    </li>
                <?php } ?>
            </ol>
        <?php } ?>
    </div>
</div>