<form action="/exe/conta/pix/enviar" method="post">
    <div class="modal fade" id="pixEnviarModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-bg-success">
                    <span class="modal-title"><i class="bi bi-x-diamond-fill me-1"></i> Enviar Pix</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="pixEnviarModalMain">
                    <ul class="list-group mt-1 ft-10">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 align-self-end align-self-center"><i class="bi bi-key-fill me-1"></i> Chave Pix</div>
                                <div class="col-12 col-sm-6 col-md-8 text-end">
                                    <div class="input-group mb-0">
                                        <input type="text" class="form-control form-control-sm" placeholder="Digite a chave Pix" name="pixEnviarChave" id="pixEnviarChave" required autocomplete="off">
                                        <button type="button" class="btn btn-outline-success btn-sm w-px-120 PixChaveColar" data-eb-target="#pixEnviarChave"><i class="bi bi-clipboard me-1"></i> Colar</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 align-self-end align-self-center"><i class="bi bi-cash"></i> Valor</div>
                                <div class="col-12 col-sm-6 col-md-8 text-end d-flex">
                                    <input type="text" class="form-control form-control-sm text-center w-px-150 MaskValor" inputmode="numeric"  placeholder="R$ 0,00" name="pixEnviarValor" id="pixEnviarValor" required autocomplete="off">
                                    <select name="pixEnviarValorForma" id="pixEnviarValorForma" class="form-select form-select-sm ms-1" required>
                                        <option value="0">Usar saldo em conta</option>
                                        <?php foreach($fConta['cartoes'] as $KeyC=>$ViewC){ ?>
                                        <option value="<?= $ViewC['card_id']; ?>">Cartão <?= $ViewC['card_tipo_nome']; ?> | Limite R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', ''); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row py-1">
                                <div class="col-12 col-sm-6 col-md-4 align-self-end align-self-center"><i class="bi bi-person"></i> Destinatŕario</div>
                                <div class="col-12 col-sm-6 col-md-8 text-sm-end align-self-center">
                                    <span id="pixEnviarDestinatario" class="fw-bold text-uppercase"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="modal-body d-none" id="pixEnviarModalCopy">
                    <div>
                        <label for="pixEnviarCopyInsert" class="main w-100">
                            <div class="row">
                                <div class="col-6 align-self-end">Pix Copia e Cola</div>
                                <div class="col-6 text-end mb-1">
                                    <button class="btn btn-sm btn-warning PixChaveColar" data-eb-target="#pixEnviarCopyInsert"><i class="bi bi-clipboard me-1"></i> Colar</button>
                                </div>
                            </div>    
                        </label>
                        <textarea name="pixEnviarCopyInsert" class="form-control form-control-sm" rows="4" id="pixEnviarCopyInsert"></textarea>
                    </div>
                    <ul class="list-group mt-1 ft-10">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 align-self-end"><i class="bi bi-key"></i> Chave Pix</div>
                                <div class="col-6 text-end">
                                    <span id="pixEnviarCopyInsertChave"></span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 align-self-end"><i class="bi bi-cash-coin"></i> Valor</div>
                                <div class="col-6 text-end">
                                    R$ <span id="pixEnviarCopyInsertValor"></span>
                                </div>
                            </div>
                        </li>
                        <!-- pixEnviarValor -->
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 align-self-end"><i class="bi bi-send-exclamation-fill"></i> Debitar em</div>
                                <div class="col-6 text-end">
                                    <select name="pixEnviarValorFormaAlt" id="pixEnviarValorFormaAlt" class="form-select form-select-sm ms-1" required>
                                        <option value="0">Usar saldo em conta</option>
                                        <?php foreach($fConta['cartoes'] as $KeyC=>$ViewC){ ?>
                                        <option value="<?= $ViewC['card_id']; ?>">Cartão <?= $ViewC['card_tipo_nome']; ?> | Limite R$ <?= number_format($ViewC['card_limite_livre'], 2, ',', ''); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 align-self-end align-self-center"><i class="bi bi-person"></i> Destinatŕario</div>
                                <div class="col-6 text-end">
                                    <span id="pixEnviarCopyInsertDestinatario"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" id="pixEnviarCopiaeCola" class="btn btn-warning btn-sm"><i class="bi bi-clipboard me-1"></i> Copiar e Colar</button>
                    <div>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-cash-coin me-1"></i> Confirmar</button>
                        <input type="hidden" name="conta" value="<?= $URI[1]; ?>">
                        <input type="hidden" name="pixEnviarDestinatarioNome" id="pixEnviarDestinatarioNome">
                        <?= Token(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>