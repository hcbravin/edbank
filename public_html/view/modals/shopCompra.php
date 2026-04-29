<form action="/exe/conta/shop/<?= $URI[4]; ?>" method="post">
    <div class="modal fade" id="compraModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <span class="modal-title"><i class="bi bi-shop me-1"></i> Comprar Item</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"><?= $Produto['title']; ?></h5>
                    <div class="text-center mb-2">
                        <img src="<?= $Produto['thumbnail']; ?>" alt="<?= $Produto['title']; ?>" width="200">
                    </div>
                    <div class="mb-3 row">
                        <div class="col-12 col-sm-6 col-md-8 mb-1 mb-sm-0 align-self-end">
                            <ul class="list-group mb-0">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Valor a pagar</span>
                                    <div>
                                        <span class="ft-8">R$</span>
                                        <span id="compraModalValor" class="fw-bold text-success"><?= number_format($Produto['price_real_discount'], 2, ',', '.'); ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mb-1 mb-sm-0">
                            <label for="compraModalQuantidade">Estoque: <?= $Produto['stock']; ?></label>
                            <div class="input-group">
                                <button type="button" class="btn btn-secondary" data-eb-quantidade="-1" id="compraModalQuantidadeMenos"><i class="bi bi-dash"></i></button>
                                <input type="number" step="1" min="1" max="<?= $Produto['stock']; ?>" value="1" class="form-control text-center" placeholder="Quantidade" name="compraModalQuantidade" id="compraModalQuantidade" required>
                                <button type="button" class="btn btn-secondary" data-eb-quantidade="1" id="compraModalQuantidadeMais"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-8 mb-1 mb-sm-0">
                            <label for="compraModalMetodo">Pagar com</label>
                            <select name="compraModalMetodo" id="compraModalMetodo" class="form-control" required>
                                <option value="0">Saldo em conta</option>
                                <?php foreach ($fConta['cartoes'] as $KeyC => $ViewC) { ?>
                                    <option value="<?= $KeyC; ?>" data-eb-limite="<?= $ViewC['card_limite_livre']; ?>">Cartão <?= $ViewC['card_tipo_nome']; ?> | Limite R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', '.'); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 mb-1 mb-sm-0">
                            <label for="compraModalParcela">Parcelar em</label>
                            <select name="compraModalParcela" id="compraModalParcela" class="form-control text-center" disabled required>
                                <option value="1">1x sem juros</option>
                                <option value="2">2x sem juros</option>
                                <option value="3">3x sem juros</option>
                                <option value="4">4x com juros</option>
                                <option value="5">5x com juros</option>
                                <option value="6">6x com juros</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <div class="row w-100">
                        <div class="col-12 col-sm-6 col-md-8 ft-10 d-none d-sm-block">
                            Ao realizar a compra você concorda com todos os termos de compra e serviços. A retira do produto é por conta do comprador.
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 text-end align-self-center">
                            <button type="submit" class="btn btn-sm btn-success w-px-150"><i class="bi bi-cart-check me-1"></i> Comprar</button>
                            <input type="hidden" name="compraModalValorPagar" id="compraModalValorPagar" value="<?= $Produto['price_real']; ?>">
                            <input type="hidden" name="compraModalValorPagarDiscount" id="compraModalValorPagarDiscount" value="<?= $Produto['price_real_discount']; ?>">
                            <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                            <input type="hidden" name="agencia" value="<?= $fConta['ct_agencia']; ?>">
                            <input type="hidden" name="compraModalItem" value="<?= $URI[4]; ?>">
                            <input type="hidden" name="compraModalKey" value="<?= @$Produto['chave']; ?>">
                            <?= Token(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>