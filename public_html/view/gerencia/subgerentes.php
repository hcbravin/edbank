<form action="/exe/agencia/subgerente" method="post">
    <div class="text-end mb-2">
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#ModalSubGerente" type="button"><i class="bi bi-plus-circle me-1"></i> Cadastrar</button>
        <?= Button(); ?>
        <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
    </div>

    <ul class="list-group mt-3 shadow-md" id="SubgerentesList">
        <?php if (!count($Subgerentes)) { ?>
        <li class="list-group-item list-group-item-warning text-center" id="SubgerentesEmpty">
            <div class="">Nenhum subgerente cadastrado.</div>
        </li>
        <?php } else { foreach ($Subgerentes as $KeySG => $ViewSG) { ?>
        <li class="list-group-item d-flex justify-content-between">
            <div class="align-self-center">
                <span class="fw-bold text-uppercase"><?= $ViewSG['user_nome']; ?></span>
                <br />
                <small class="opacity-50 ft-10"><?= $ViewSG['user_email']; ?></small>
            </div>

            <div class="align-self-center me-2">
                <?php if ($ViewSG['agg_ativo'] == 2) { ?>
                    <span class="ft-10">
                        <i class="bi bi-clock-history me-1"></i> Convite Enviado
                    </span>

                <?php } else { ?>
                    <div class="form-check form-switch">
                        <input type="hidden" name="subgerente[<?= $ViewSG['agg_user']; ?>]" value="0">
                        <input class="form-check-input" name="subgerente[<?= $ViewSG['agg_user']; ?>]" value="1" type="checkbox" role="switch" id="subGerenteSwitch<?= $ViewSG['agg_user']; ?>" <?= $ViewSG['agg_ativo'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="subGerenteSwitch<?= $ViewSG['agg_user']; ?>">Ativo</label>
                    </div>
                    <hr class="my-2">
                    <button class="btn btn-sm btn-danger" type="button" data-eb-rmv="exe/agencia/subgerente/<?= $URI[1] ?>/remover/<?= $MS['user_id']; ?>"><i class="bi bi-trash3-fill"></i> Excluir</button>
                <?php } ?>
            </div>
        </li>
        <?php }} ?>
    </ul>
</form>