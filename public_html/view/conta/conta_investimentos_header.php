<div class="row justify-content-center">
    <div class="col-12 col-sm-8 mb-2">
        <div class="infomain bd-1 bd-primary shadow-md w-100 d-flex justify-content-between align-items-center">
            <span class="align-self-center"><i class="bi bi-bar-chart-fill me-1"></i> Meus Investimentos</span>
            <a href="/conta/<?= $URI[1]; ?>/investimentos" class="<?= !is_numeric($URI[3]) ? 'd-none' : '' ?> btn btn-sm btn-primary px-4 shadow-md"><i class="bi bi-arrow-left-square me-1"></i> Ver Todos</a>
        </div>
    </div>
</div>