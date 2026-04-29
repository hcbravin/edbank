<!-- Meus Investimentos -->
<div class="row justify-content-center mb-3">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="list-group shadow-md">
            <?php if(count($MeusInvestimentos) > 0){ foreach ($MeusInvestimentos as $KeyI => $ViewI) { if($ViewI['inv_ativo'] == 1 OR ($ViewI['inv_ativo'] == 0 AND $ViewI['inv_saldo'] != 0)){ ?>

            <a href="/conta/<?= $URI[1]; ?>/investimentos/<?= $ViewI['inv_id']; ?>" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="badge text-bg-warning w-px-50 me-2"><?= $ViewI['inv_taxa']; ?>%</span> <i class="bi bi-piggy-bank me-2"></i> <?= $ViewI['inv_info']; ?>
                    </div>
                    <div class="text-end">
                        <small class="<?= $ViewI['inv_ativo']?'d-none':'me-1' ;?>"><i class="bi bi-trophy-fill text-warning"></i> Finalizado</small>
                        <span class="badge text-bg-<?= $ViewI['inv_ativo']?'primary':'warning' ;?>">R$ <?= number_format($ViewI['inv_saldo'],2,',','.'); ?></span>
                        <span class="badge text-bg-success <?= $ViewI['inv_ativo']?'':'d-none' ;?>">R$ <?= number_format($ViewI['inv_saldo'] - $ViewI['inv_capital'],2,',','.'); ?></span>
                    </div>
                </div>
            </a>
            <?php }}}else{ ?>
            <li class="list-group-item list-group-item-action text-center bd-1 bd-danger">
                <i class="bi bi-heartbreak-fill me-1"></i> Você ainda não possui nenhum investimento.
            </li>
            <?php } ?>
        </div>
        <div class="d-flex justify-content-between text-end mt-2 ft-9">
            <div>
                <i class="bi bi-square-fill text-warning mr-1"></i> Taxa
            </div>
            <div>
                <i class="bi bi-square-fill text-primary mr-1"></i> Capital
                <i class="bi bi-square-fill text-success mr-1 ms-2"></i> Rendimentos
            </div>
        </div>
    </div>
</div>