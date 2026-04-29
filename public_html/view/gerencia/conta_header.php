<div class="row mb-4">
    <div class="col-12 col-sm-2 col-md-1 text-center">
        <img src="<?= $Conta['user_foto']; ?>" class="UserPic-75">
    </div>
    <div class="col-12 col-sm-4 mb-2">
        <div class="infomain bg-white mb-2 bd-1 bd-success shadow-md text-uppercase d-flex justify-content-between">
            <div>
                <span class="badge-alt me-2 text-bg-primary align-self-center"><?= $Conta['ct_conta'] . ' - ' . $Conta['ct_digito']; ?></span>
                <span><i class="fa fa-user me-1"></i> <?= $Conta['user_nome']; ?></span>
            </div>
            <span class="badge-alt text-bg-<?= $Conta['ct_ativo'] ? 'success' : 'danger'; ?> align-self-center">
                <?= $Conta['ct_ativo'] ? 'Ativo' : 'Inativo'; ?>
            </span>
        </div>
        <div class="infomain mb-2 bd-1 bd-primary shadow-md text-lowercase">
            <i class="bi bi-envelope-at-fill me-1"></i> <a target="_blank" class="text-primary" href="mailto:<?= $Conta['user_email']; ?>"><?= $Conta['user_email']; ?></a>
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-2">
        <div class="infomain bg-white mb-2 bd-1 bd-success shadow-md text-uppercase d-flex justify-content-between">
            <span><?= $Conta['pf_nome']; ?></span>
            <span class="fw-bold text-success align-self-center">
                R$ <?= number_format($Conta['pf_salario'],2,',','.'); ?>
            </span>
        </div>
    </div>
    <div class="col-12 col-sm-2 col-sm-3 mb-2 text-end">
        <?php if($URI[4]){ ?>
        <a href="/gerencia/<?= $URI[1]; ?>/contas/<?= $URI[3]; ?>" class="btn btn-sm w-px-150 btn-warning"><i class="bi bi-arrow-left me-1"></i> Voltar a Conta</a>
        <?php }else{ ?>
        <button class="btn btn-sm w-px-150 btn-<?= $Conta['ct_ativo'] ? 'danger':'success'; ?>" data-eb-rmv="upg/conta/ativo/<?= $URI[1]; ?>/<?= $URI[3]; ?>"><i class="bi bi-<?= $Conta['ct_ativo'] ? '':'un'; ?>lock me-1"></i> <?= $Conta['ct_ativo'] ? 'Bloquear':'Desbloquear'; ?></button>
        <button type="button" class="btn btn-dark btn-sm w-px-150" data-eb-rmv="upg/conta/encerrar/<?= $URI[1]; ?>/<?= $URI[3]; ?>"><i class="bi bi-person-fill-x me-1"></i> Encerar Conta</button>
        <?php } ?>
    </div>
</div>