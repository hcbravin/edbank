<div class="row justify-content-center"  id="notificacoesContaModal" data-eb-conta="<?= $URI[1]; ?>">
    <div class="col-12 col-sm-10 col-md-8 d-flex">
        <div class="infomain bd-1 bd-primary mb-2 shadow-md w-100 d-flex justify-content-between">
            <span class="align-self-center"><i class="bi bi-bell-fill me-1"></i> Notificações</span>
            <button type="button" class="btn btn-sm btn-primary" id="NotificacaoTodos" data-eb-notification="true">
                Marcar Todas    
                <div class="badge ms-2 text-bg-danger align-self-center <?= $NotificacoesClose == 0 ? 'd-none' : ''; ?>"><?= $NotificacoesClose; ?></div>
            </button>
        </div>
    </div>
    <div class="col-12 col-sm-10 col-md-8">
        <ul class="list-group">
            <?php foreach ($Notificacoes as $KeyN => $ViewN) { ?>
                <li class="list-group-item list-group-item-action d-flex justify-content-between NotificacaoItem mpoint" data-eb-notification="<?= $KeyN; ?>">
                    <div class="small"><?= $ViewN['nt_info']; ?></div>
                    <div>
                        <small><?= Data($ViewN['nt_dref'],3); ?></small>
                        <span class="bi bi-envelope-<?= $ViewN['nt_lido'] ? 'open' : 'fill'; ?>"></span>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>