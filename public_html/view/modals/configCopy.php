<div class="modal" tabindex="-1" id="ModalConfigCopy" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-dark">
                <span class="modal-title"><i class="bi bi-copy me-1"></i> Copiar Configurações</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <h5 class="text-danger"><i class="bi bi-exclamation-triangle me-1"></i> Atenção</h5>
                <div class="infomain bd-1 bd-danger mb-2 shadow-md">
                    Essa configuração irá realizar a cópia das configurações <strong>destá agência</strong> para as agências selecionadas. Todas as configurações e o Shopping serão copiadas. A ação após realizada, <strong>não poderá ser desfeita</strong>.
                </div>

                <form action="/upg/agencia/config/copiar" method="post">
                    <div class="px-2 mt-3">
                        <?php foreach($MS['gerente'] as $KeyG=>$ViewG){if($KeyG!=$URI[1]){ ?>
                        <div class="form-check">
                            <input class="form-check-input ModalConfigCopyItem" name="copy[<?= $KeyG; ?>]" value="<?= $KeyG; ?>" type="checkbox" id="ModalConfigCopy<?= $KeyG; ?>">
                            <label class="form-check-label" for="ModalConfigCopy<?= $KeyG; ?>">
                                <i class="bi bi-bank me-1"></i> <?= ZeroEsquerda($ViewG['ag_num']); ?> <i class="bi bi-arrow-right me-1"></i> <?= $ViewG['ag_info']; ?>
                            </label>
                        </div>
                        <?php }} ?>
                    </div>
                    <div class="text-end">
                        <button type="submit" id="ModalConfigCopySubmit" class="btn btn-sm btn-warning w-px-150" disabled>
                            <i class="bi bi-copy me-1"></i> Copiar
                        </button>
                    </div>

                    <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
                    <?= Token(); ?>
                </form>

            </div>
        </div>
    </div>
</div>