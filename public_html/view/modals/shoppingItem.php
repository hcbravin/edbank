<div class="modal fade" id="shopNewItem" tabindex="-1" data-eb-dolar="<?= new Taxas() -> getDolar(); ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-warning">
                <span class="modal-title"><i class="bi bi-shop me-1"></i> Novo item do shopping</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <span class="badge text-bg-secondary">
                            Informações
                        </span>
                        <hr class="my-1">
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 mb-2">
                        <div class="form-group">
                            <label class="main" for="shopItemTitle"><i class="bi bi-tag me-1"></i> Título</label>
                            <input type="text" name="shop[{id}][title]" placeholder="Nome do produto (Requerido) " class="form-control form-control-sm" id="shopItemTitle" required>
                        </div>
                        <div class="form-group">
                            <label class="main" for="shopItemDescription"><i class="bi bi-chat-right-text me-1"></i> Descrição</label>
                            <textarea name="shop[{id}][description]" placeholder="Descrição do produto (Requerido)" class="form-control form-control-sm" id="shopItemDescription" rows="3"></textarea>
                        </div>
                        <div class="ft-8 text-muted">
                            * O uso do Dolar como padrão é adotado por conta da api usada nos demais itens do shop. <br/>
                            ** O cliente só poderá comprar enquanto houver quantidade disponível. Caso não seja informado uma quantidade o sistema irá gerar um valor aleatório entre 100 à 1000.
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-1">
                        <div class="form-group mb-2">
                            <label class="main" for="shopItemValue"><i class="bi bi-cash me-1"></i> Valor em <span class="text-primary fw-bold">US Dolar *</span></label>
                            <input type="number" step="0.01" min="0.01" name="shop[{id}][price]" placeholder="0.00" class="form-control form-control-sm text-center" id="shopItemValue" required>
                            <small class="ft-8 text-muted">Valor em R$ <span class="fw-bold" id="shopItemRealValue">0.00</span></small>
                        </div>
                        <div class="form-group mb-2">
                            <label class="main" for="shopItemDesconto"><i class="bi bi-cash me-1"></i> % Desconto à vista</label>
                            <input type="number" step="0.01" min="0" max="100" name="shop[{id}][discountPercentage]" placeholder="0.00" class="form-control form-control-sm text-center" id="shopItemDesconto" value="0" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="main" for="shopItemQuantidade"><i class="bi bi-cart me-1"></i> Quantidade disponível **</label>
                            <input type="number" step="0.01" min="0" max="100" name="shop[{id}][quantidade]" placeholder="0.00" class="form-control form-control-sm text-center" id="shopItemQuantidade" value="0">
                        </div>
                    </div>

                    <div class="col-12 my-2">
                        <span class="badge text-bg-secondary">
                            Imagens
                        </span>
                        <hr class="my-1">
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="main" for="shopItemImageMini"><i class="bi bi-image me-1"></i> Miniatura</label>
                            <input type="url" name="shop[{id}][thumbnail]" placeholder="URL da imagem" class="form-control form-control-sm" id="shopItemImageMini">
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="main" for="shopItemImage"><i class="bi bi-image me-1"></i> Imagens</label>
                            <input type="url" name="shop[{id}][images][]" placeholder="URL da imagem 1 (Requerida)" class="form-control form-control-sm mb-1" id="shopItemImage0" required>
                            <input type="url" name="shop[{id}][images][]" placeholder="URL da imagem 2" class="form-control form-control-sm mb-1" id="shopItemImage1">
                            <input type="url" name="shop[{id}][images][]" placeholder="URL da imagem 3" class="form-control form-control-sm mb-1" id="shopItemImage2">
                        </div>
                    </div>

                    <div class="col-12 mb-2 text-end">
                        <button type="button" id="shopItemSubmit" class="w-px-150 btn btn-sm btn-warning"><i class="bi bi-cart-plus-fill me-1"></i> Criar Item</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>