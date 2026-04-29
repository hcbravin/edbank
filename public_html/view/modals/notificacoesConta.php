<div class="modal fade" id="notificacoesContaModal" tabindex="-1" data-eb-conta="<?= $URI[1]; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-primary">
                <span class="modal-title"><i class="bi bi-bell-fill me-1"></i> Notificações</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-1">
                <ul class="list-group">
                <?php if($Notificacoes){ foreach($Notificacoes as $KeyN=>$ViewN){ ?>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between NotificacaoItem mpoint" data-eb-notification="<?= $KeyN; ?>">
                        <small><?= $ViewN['nt_info']; ?></small>
                        <span class="bi bi-envelope-<?= $ViewN['nt_lido'] ? 'open' : 'fill'; ?>"></span>
                    </li>
                <?php }}else{ ?>
                    <li class="list-group-item list-group-item-action text-center">Nada por aqui por hora.</li>
                <?php } ?>
                </ul>
            </div>
            <div class="modal-footer py-1">
                <a href="/conta/<?=$URI[1];?>/notificacoes" class="btn btn-sm btn-outline-primary"><i class="bi bi-view-list me-1"></i> Ver Todos</a>
                <button class="btn btn-sm btn-outline-success" id="NotificacaoTodos" data-eb-notification="true"><i class="bi bi-check me-1"></i> Marcar Todos como Lido</button>
            </div>
        </div>
    </div>
</div>