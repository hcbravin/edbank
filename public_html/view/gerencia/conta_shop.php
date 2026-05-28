<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <?php if (!is_array($Shop) or count($Shop) == 0) {
            alert('Esta conta não possui itens adquiridos no shopping.');
        } else { ?>
            <div class="infomain bd-1 bd-primary shadow-md mb-2"><i class="bi bi-cart me-1"></i> Itens adquiridos no Shopping</div>
        
            <ol class="list-group">
        
                <li class="list-group-item text-end" id="iShopItemContaSave">
                    <button class="btn btn-sm btn-success w-px-150"><i class="bi bi-save me-1"></i> Salvar</button>
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
                                <button type="button" class="me-2 btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                <div class="input-group w-px-150">
                                    <button class="btn btn-sm btn-secondary w-px-30">-</button>
                                    <input type="number" name="item[<?= $KeyS; ?>]" value="<?= $ViewS['cts_item']['stock']; ?>" step="1" min="0" class="form-control form-control-sm text-center iShopItemStock">
                                    <button class="btn btn-sm btn-secondary w-px-30">+</button>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>



                <!-- <?php foreach ($Shop as $KeyS => $ViewS) { ?>
                    <li class="list-group-item d-sm-flex justify-content-sm-between iShopItem  bg-gfocus-hover">
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
                        <div class="d-flex d-sm-block justify-content-center align-self-end">
                            <div class="mb-1 ft-9 text-end">
                                <?= date('d/m/Y', strtotime($ViewS['cts_dref'])); ?> às <?= date('H:i:s', strtotime($ViewS['cts_dref'])); ?>
                            </div>
                            <button class="btn btn-sm btn-danger" data-eb-rmv="upg/conta/shop/remove/<?= $URI[1]; ?>/<?= $URI[3]; ?>/<?= $ViewS['cts_id']; ?>/0/<?= $TokenShop; ?>">
                                <i class="bi bi-trash me-1"></i> Excluir
                            </button>
                            <div class="btn-group ms-1">
                                <button class="<?= $ViewS['cts_item']['stock'] <= 1 ? 'disabled' : ''; ?> btn btn-sm btn-primary iShopItemContaReduzir" data-eb-srmv="upg/conta/shop/remove/<?= $URI[1]; ?>/<?= $URI[3]; ?>/<?= $ViewS['cts_id']; ?>/{quantidade}/<?= $TokenShop; ?>">
                                    <i class="bi bi-cart me-1"></i> Reduzir
                                    <span class="badge text-bg-warning ms-1">0</span>
                                </button>
                                <button class="<?= $ViewS['cts_item']['stock'] <= 1 ? 'disabled' : ''; ?> btn btn-sm btn-warning iShopItemContaInserir"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                        <input type="hidden" class="iShopItemStock" name="item[<?= $KeyS; ?>]" value="<?= $ViewS['cts_item']['stock']; ?>">
                    </li>
                <?php } ?> -->
            </ol>
        <?php } ?>
    </div>
</div>


<script>
    $(function() {
        $('button.iShopItemContaInserir').click(function() {
            let botao = $(this).closest('div.btn-group').find('button.iShopItemContaReduzir');
            let srmv = botao.data('eb-srmv');
            const stock = $(this).closest('li.list-group-item').find('span.iShopItemContaStock').text();
            const confirmacao = prompt("Deseja remover quantas unidades deste item (De 1 à " + stock + ")?");

            if (confirmacao < 1 || confirmacao > stock || isNaN(confirmacao)) {
                botao.removeAttr('data-eb-rmv');
                botao.find('span.badge').text(0);
                return;

            } else {
                botao.attr('data-eb-rmv', srmv.replace('{quantidade}', confirmacao));
                botao.find('span.badge').text(confirmacao);
                return
            }
        });
    });
</script>