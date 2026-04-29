<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">

        <div class="infomain bd-1 bd-primary mb-2 shadow-md">
            <i class="bi bi-trophy-fill text-warning me-1"></i> Ranking de compras no Shopping
        </div>
        
        <div class="list-group list-group-numbered">
            <?php foreach ($Chart['contas'] as $User) { ?>
                <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $User['cts_conta']; ?>/shop" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <div class="fw-bold w-100 ms-2"><?= $User['user_nome']; ?></div>
                    <div class="d-flex align-self-center">
                        <span class="badge bg-primary rounded ms-1"><?= $User['total_stock']; ?></span>
                        <span class="badge bg-success rounded ms-1">R$ <?= number_format($User['valor_total'], 2, ',', '.'); ?></span>
                    </div>
                </a>
            <?php } ?>
        </div>

    </div>
</div>