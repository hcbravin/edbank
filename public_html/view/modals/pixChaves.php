<form action="/upg/conta/pix/chaves" method="post">
    <div class="modal fade" id="pixChavesModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <span class="modal-title"><i class="bi bi-x-diamond-fill me-1"></i> Chaves Pix</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-striped mb-0">
                        <thead>
                            <tr>
                                <td><i class="bi bi-key me-1"></i> Chave</td>
                                <td class="text-end"><i class="bi bi-check me-1"></i> Ativo</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($MinhasChaves)){ ?>
                            <tr>
                                <td class="text-center p-3 ft-11" colspan="2">Você ainda não tem nenhuma Chave Pix cadastrada.</td>
                            </tr>
                            <?php }else{ foreach($MinhasChaves as $KeyK => $ViewK){ ?>
                            <tr>
                                <td class="px-2 w-75 align-middle"><?= $ViewK['chave']; ?></td>
                                <td class="px-2 align-middle">
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" value="<?= $ViewK['chave']; ?>" name="chaves[<?= $KeyK; ?>]" type="checkbox" role="switch" id="pixKey<?= $KeyK; ?>" <?= $ViewK['ativo'] ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="pixKey<?= $KeyK; ?>"></label>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary PixChaveCopiar" type="button" data-pixchave="<?= $ViewK['chave']; ?>">
                                        <i class="bi bi-copy me-1"></i> Copiar
                                    </button>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
                    <button class="btn btn-success" type="submit"><i class="bi bi-cash-coin me-1"></i> Confirmar</button>
                    <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                    <?= Token(); ?>
                </div>
            </div>
        </div>
    </div>
</form>