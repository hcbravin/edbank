<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 text-end">
        <div class="infomain bd-1 bd-primary mb-2 shadow-md d-flex justify-content-between align-items-center">
            <span><i class="bi bi-tags-fill me-1"></i> <?= $Categoria['nome']; ?></span>
            <a href="/conta/<?= $URI[1]; ?>/shopping" class="btn btn-sm btn-warning w-px-120"><i class="bi bi-arrow-left-short me-1"></i> Voltar</a>
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <div class="row">
            <?php foreach ($Shop -> apiCategory as $KeyP => $ViewP) { ?>
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div class="card shadow md-2 h-100">
                        <div class="card-body text-center d-flex flex-column">
                            <h4><?= $ViewP['title']; ?></h4>
                            <div class="d-flex align-items-center justify-content-center flex-grow-1" style="min-height: 150px;">
                                <img src="<?= $ViewP['thumbnail']; ?>" loading="lazy" class="imageShop" style=" max-width: 100%; object-fit: contain;">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <span class="ft-10">R$</span>
                                    <span class="fw-bold ft-16"><?= number_format($ViewP['price'] * $Shop->Dolar, 2, ',', '.'); ?></span>
                                </div>
                                <div>
                                    <?php if($ViewP['stock']){ ?>
                                    <a href="/conta/<?= $URI[1]; ?>/shopping/produto/<?= $Shop -> categoriaID .'.'. $ViewP['id']; ?>" class="btn btn-outline-dark btn-sm">Detalhes</a>
                                    <?php }else{ ?>
                                    <span class="disabled btn btn-sm btn-outline-danger">Em Falta</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-start mb-0">
                        <span class="ft-8 text-muted"><?= $ViewP['stock']; ?> Disponíveis</span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>