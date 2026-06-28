<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <?php if (!is_array($Shop) or count($Shop) == 0) {
            alert('Esta conta não possui itens adquiridos no shopping.');
        } else { ?>
            <div class="infomain bd-1 bd-primary shadow-md mb-2"><i class="bi bi-cart me-1"></i> Itens adquiridos no Shopping</div>
        
            <form action="/upg/conta/shop/itens" method="post">
                <ol class="list-group">
            
                    <li class="list-group-item text-end" id="iShopItemContaSave">
                        <button type="submit" class="btn btn-sm btn-success w-px-150"><i class="bi bi-save me-1"></i> Salvar</button>
                        <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
                        <input type="hidden" name="conta" value="<?= $URI[3]; ?>">
                        <?= Token(); ?>
                    </li>

                    <?php foreach ($Shop as $KeyS => $ViewS) { ?>
                        <li class="list-group-item d-sm-flex justify-content-sm-between align-items-stretch iShopItem bg-gfocus-hover">
                            <div class="d-flex mb-2 mb-sm-0">
                                <img src="<?= $ViewS['cts_item']['thumbnail'] ?>" alt="" width="100" class="align-self-center">
                                <div class="mx-4" class="align-self-center">
                                    <div class="fw-bold"><?= $ViewS['cts_item']['title']; ?></div>
                                    <div class="align-self-center">
                                        <div class="btn-group w-px-200">
                                            <span class="btn btn-sm btn-secondary py-0">1</span>
                                            <span class="btn btn-sm w-100 btn-light border py-0 d-flex justify-content-between"><span>R$</span> <span><?= number_format($ViewS['cts_item']['price_unity'], 2, ',', '.'); ?></span></span>
                                        </div>
                                        <br>
                                        <div class="btn-group w-px-200">
                                            <span class="btn btn-sm btn-primary py-0 iShopItemContaStock"><?= $ViewS['cts_item']['stock']; ?></span>
                                            <span class="btn btn-sm w-100 btn-warning py-0 d-flex justify-content-between"><span>R$</span> <span><?= number_format($ViewS['cts_item']['price_unity'] * $ViewS['cts_item']['stock'], 2, ',', '.'); ?></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column justify-content-between">
                                <div class="mb-1 ft-9 text-end pt-2 pe-2">
                                    <?= date('d/m/Y', strtotime($ViewS['cts_dref'])); ?> às <?= date('H:i:s', strtotime($ViewS['cts_dref'])); ?>
                                </div>
                                <div class="d-flex pb-2">
                                    <button type="button" class="me-2 btn btn-sm btn-outline-danger iShopItemTrash"><i class="bi bi-trash"></i></button>
                                    <div class="input-group w-px-150">
                                        <button type="button" class="btn btn-sm btn-secondary w-px-30 iShopItemReduce">-</button>
                                        <input type="number" name="item[<?= $KeyS; ?>]" value="<?= $ViewS['cts_item']['stock']; ?>" step="1" min="0" class="form-control form-control-sm text-center iShopItemStock">
                                        <button type="button" class="btn btn-sm btn-secondary w-px-30 iShopItemIncrease">+</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ol>
            </form>
        <?php } ?>
    </div>
</div>