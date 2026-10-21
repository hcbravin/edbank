<div class="modal" tabindex="-1" id="PicToPay" data-eb-tapcode="<?= UniqID(); ?>" data-eb-agencia="<?= $URI[1]; ?>" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <div class="modal-header text-bg-warning">
                <h6 class="modal-title py-1"><i class="bi bi-paypal me-1"></i> Pic to Pay</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex flex-column overflow-hidden">

                <div class="flex-shrink-0">

                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <div class="alert alert-danger py-1 mb-0 position-relative d-none" id="PicToPayTypeEntrada">
                                <i class="bi bi-file-arrow-down me-1"></i> Receber do cliente
                                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger PicToPayTapQt">0</span>
                            </div>
                            <div class="alert alert-success py-1 mb-0 position-relative" id="PicToPayTypeSaida">
                                <i class="bi bi-file-arrow-up me-1"></i> Pagar ao cliente
                                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger PicToPayTapQt">0</span>
                            </div>
                            <div class="alert alert-secondary py-1 ms-3 mb-0" id="PicToPayValorInfo">R$ 200,00</div>


                        </div>
                        <button class="btn btn-dark align-self-start pb-1"><i class="bi bi-camera-fill"></i></button>
                    </div>

                    <div class="ft-10 mb-1">APONTE O QRCODE DO SEU CARTÃO PARA CÂMERA</div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-ms-8 col-md-6 col-lg-4">
                            <div class="infomain w-100 h-100 border rounded position-relative overflow-hidden bg-dark" id="PicToPayCamera">
                                <div id="qr-reader" class="PicToPayReader"></div>
                                <div id="PicToPayPause" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-bg-secondary ft-26 text-uppercase text-center fw-bold">
                                    <!-- Status Realizado -->
                                    <div class="PicToPayPauseStatus d-none" data-eb-status="success" data-eb-color="success">
                                        <i class="bi bi-check-square" style="font-size: 70px;"></i>
                                        <br />
                                        <span>Realizado</span>
                                    </div>
                                    <!-- Status Aguardando -->
                                    <div class="PicToPayPauseStatus d-none" data-eb-status="processing" data-eb-color="warning">
                                        <div class="spinner-border" style="width: 6rem; height: 6rem;" role="status">
                                            <span class="sr-only"></span>
                                        </div>
                                        <br />
                                        <div>Processando</div>
                                        <div class="ft-12 fw-normal">Aguarde</div>
                                    </div>
                                    <!-- Status Erro -->
                                    <div class="PicToPayPauseStatus d-none" data-eb-status="error" data-eb-color="danger">
                                        <i class="bi bi-x-square" style="font-size: 70px;"></i>
                                        <br />
                                        <div>erro</div>
                                        <div class="ft-14" id="PicToPayPauseErrorText">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>