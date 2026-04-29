<div class="modal fade" id="pixReceberModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bg-warning">
                <span class="modal-title"><i class="bi bi-x-diamond-fill me-1"></i> Receber Pix</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <?php if($PixChavesAtivas > 0){ ?>
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-5 col-md-4">
                        <div class="">
                            <label class="form-label"><i class="bi bi-cash-coin me-1"></i> Valor (R$)</label>
                            <input type="text" inputmode="numeric" class="form-control form-control-sm text-center" name="contaTransferirValor" id="contaTransferirValor" placeholder="R$ 0,00" data-eb-chave="<?= $PixChaveMain; ?>">
                        </div>
                    </div>
                    <div class="col-6 col-sm-5 col-md-4 align-self-end">
                        <button class="w-100 btn btn-success btn-sm" id="pixGerarQrCodeButton">
                            <i class="bi bi-x-diamond-fill me-1"></i> Gerar Pix
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="pixGerarQrCodeResultado" class="d-none">
                            <hr>
                            <label class="form-label w-100">
                                <div class="row">
                                    <div class="col-6 align-self-end">Pix Copia e Cola</div>
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-sm btn-warning ShareText" data-eb-target="#pixGerarQrCodePayload" data-eb-title="Pix Copia e Cola">
                                            <i class="bi bi-share me-1"></i> <small>Compartilhar</small>
                                        </button>
                                    </div>
                                </div>
                            </label>
                            <textarea class="form-control form-control-sm" id="pixGerarQrCodePayload" rows="4" readonly></textarea>
                            <div class="text-center my-3 text-center">
                                <div id="pixGerarQrCodeImage"></div>
                            </div>
                        </div>

                        <div id="pixGerarErrorMessage" class="d-none">
                            <hr>
                            <div class="alert alert-danger text-center bd-1 bd-danger small">
                                Houve algum erro ao tentar gerar seu Pix. <br> Por favor, tente novamente.
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="alert alert-warning text-center" role="alert">
                    <i class="bi bi-key-fill fs-2 me-1"></i> 
                    <br>Nenhuma chave Pix cadastrada!
                    <br>
                    <button data-bs-toggle="modal" data-bs-target="#pixChavesModal" class="btn btn-sm btn-warning mt-2">Cadastrar Chave</button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>