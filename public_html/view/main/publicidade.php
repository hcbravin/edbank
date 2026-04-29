<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 mb-2">
        <div class="infomain bd-1 bd-primary shadow-md">
            <div class="d-flex justify-content-between">
                <span class="align-self-center"><i class="bi bi-arrow-through-heart-fill text-danger me-1"></i> Nossos Apoiadores</span>
                <a href="https://hcbravin.github.io/edbank" target="_blank" class="btn btn-sm btn-warning"><i class="bi bi-balloon-heart-fill me-1"></i> Apoio este projeto.</a>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <div id="carouselPublicidadeEmpresas" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <?php foreach (Publicidade('company') as $KeyP => $ViewP) { ?>
                <button type="button" data-bs-target="#carouselPublicidadeEmpresas" data-bs-slide-to="<?= $KeyP; ?>" class="<?= $KeyP == 0 ? 'active' : ''; ?>" aria-current="true" aria-label="<?= $ViewP['name']; ?>"></button>
                <?php } ?>
            </div>
            <div class="carousel-inner">
                <?php foreach (Publicidade('company') as $KeyP => $ViewP) { ?>
                <div class="carousel-item <?= $KeyP == 0 ? 'active' : ''; ?>">
                    <a href="<?= $ViewP['website']; ?>" target="_blank">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="<?= $ViewP['imageUrl']; ?>" class="d-block w-75" alt="<?= $ViewP['name']; ?>">
                        </div>
                        <div class="carousel-caption d-none d-md-block text-start">
                            <h5><span class="text-bg-success px-2 py-1 rounded"><?= $ViewP['name']; ?></span></h5>
                            <p class="ft-10"><span class="text-bg-dark px-2 py-1 rounded"><?= $ViewP['website']; ?></span></p>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPublicidadeEmpresas" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn btn-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselPublicidadeEmpresas" data-bs-slide="next">
                <span class="carousel-control-next-icon btn btn-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>