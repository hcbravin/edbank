<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">Categorias</h6>
                <button type="button" class="btn btn-sm btn-outline-primary w-px-120" data-bs-toggle="collapse" data-bs-target=".shopCategory" aria-expanded="false" aria-controls="shopCategory"><i class="bi bi-tags-fill me-1"></i> Ver todas</button>
            </div>
            <div class="row justify-content-center g-2">
                <?php foreach ($Shop->Categorias as $KeyC => $ViewC) { ?>
                    <div class="col-4 col-sm-3 col-md-2 <?= ($KeyC > 6 or ($Mobile and $KeyC > 3)) ? 'shopCategory collapse' : ''; ?>">
                        <a href="/conta/<?= $URI[1]; ?>/shopping/categoria/<?= $KeyC; ?>" class="btn btn-sm btn-outline-primary w-100 h-100 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <i class="bi bi-<?= $ViewC['icon']; ?> fs-4"></i>
                                <br>
                                <?= $ViewC['nome']; ?>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <div class="row justify-content-center g-2">
            <?php foreach ($Shop->getAllProdutos() as $KeyP => $ViewP) { ?>
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
                                <a href="/conta/<?= $URI[1]; ?>/shopping/produto/<?= $Shop -> categoriaID .'.'. $ViewP['id']; ?>" class="btn btn-outline-dark btn-sm">Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>