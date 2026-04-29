<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">

        <div class="infomain bd-1 bd-primary d-flex justify-content-between shadow-md mb-4">
            <div class="align-self-center">
                <i class="bi bi-cart me-1"></i> Informações do produto
            </div>
            <a href="/conta/<?= $URI[1]; ?>/shopping" class="btn btn-sm btn-primary w-px-120"><i class="bi bi-shop me-1"></i> Shop</a>
        </div>
        <!-- Titulo -->
        <h4 class="mb-2 border-bottom">
            <i class="bi bi-tag mr-1"></i> <?= $Produto['title'] ?>
        </h4>
        <!-- Fotos -->
        <div id="carrosselProduto" class="carousel carousel-dark slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <?php foreach ($Produto['images'] as $KeyI => $ViewI) {if(strlen($ViewI)){ ?>
                    <button type="button" data-bs-target="#carrosselProduto" data-bs-slide-to="<?= $KeyI; ?>" class="<?= $KeyI == 0 ? 'active' : ''; ?>" aria-current="<?= $KeyI == 0 ? 'true' : ''; ?>" aria-label="Photo <?= $KeyI; ?>"></button>
                <?php }} ?>
            </div>
            <div class="carousel-inner h-pxm-300">
                <?php foreach ($Produto['images'] as $KeyI => $ViewI) {if(strlen($ViewI)){ ?>
                    <div class="carousel-item h-pxm-300 <?= $KeyI == 0 ? 'active' : ''; ?>">
                        <img src="<?= $ViewI; ?>" class="d-block mx-auto h-pxm-300" alt="Photo <?= $KeyI; ?>">
                    </div>
                <?php }} ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carrosselProduto" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carrosselProduto" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
        <!-- Descrição -->
        <p class="lead mt-3 mb-4">
            <?= $Produto['description']; ?>
        </p>
        <!-- Valor -->
         <p>
            <div>
                <span class="ft-10">R$</span> <span class="ft-24 fw-bold"><?= number_format($Produto['price'] * $Shop->Dolar, 2, ',', '.'); ?></span> 
            </div>
            <div class="<?= $Produto['discountPercentage'] == 0 ? 'd-none' : ''; ?>">
                <span class="ft-10">R$</span> <span class="ft-24 fw-bold"><?= number_format($Produto['price'] * $Shop->Dolar * (1 - $Produto['discountPercentage']/100), 2, ',', '.'); ?></span> <span class="ms-2 badge text-bg-success align-self-center">Á Vista</span>
            </div>
         </p>

        <!-- Comprar -->
        <div class="infomain bd-1 bd-primary d-flex justify-content-between shadow-md">
            <div class="align-self-center ft-12">
                <span class="badge text-bg-secondary fw-normal rounded-end-0">Disponíveis</span><span class="rounded-start-0 badge text-bg-warning"><?= $Produto['stock']; ?></span>
            </div>
            <button type="button" class="btn btn-sm btn-primary w-px-150" data-bs-target="#compraModal" data-bs-toggle="modal"><i class="bi bi-cart-plus me-1"></i> Comprar</button>
        </div>
    </div>
</div>