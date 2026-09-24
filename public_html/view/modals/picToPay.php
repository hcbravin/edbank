<div class="modal" tabindex="-1" id="PicToPay" data-eb-tapCode="<?= UniqID(); ?>" data-eb-agencia="<?= $URI[1]; ?>" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">

            <div class="modal-header text-bg-warning">
                <h6 class="modal-title"><i class="bi bi-paypal me-1"></i> Pic to Pay</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex flex-column overflow-hidden">

                <div class="flex-shrink-0">

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

                    <div class="ft-10 mb-1">APONTE O QRCODE DO SEU CARTÃO PARA CÂMERA</div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-ms-8 col-md-6 col-lg-4">
                            <div class="infomain w-100 h-100 border rounded position-relative overflow-hidden bg-dark" id="PicToPayCamera">
                                <div id="qr-reader" class="PicToPayReader"></div>
                                <div id="PicToPayPause" class="d-none position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center text-bg-secondary ft-26 text-uppercase text-center fw-bold">
                                    <!-- Status Realizado -->
                                    <div class="PicToPayPauseStatus d-none" data-eb-status="success" data-eb-color="success">
                                        <i class="bi bi-check-square" style="font-size: 70px;"></i>
                                        <br/>
                                        <span>Realizado</span>
                                    </div>
                                    <!-- Status Aguardando -->
                                    <div class="PicToPayPauseStatus d-none" data-eb-status="processing" data-eb-color="warning">
                                        <div class="spinner-border" style="width: 6rem; height: 6rem;" role="status">
                                            <span class="sr-only"></span> 
                                        </div>
                                        <br/>
                                        <div>Processando</div>
                                        <div class="ft-12 fw-normal">Aguarde</div>
                                    </div>
                                    <!-- Status Erro -->
                                    <div class="PicToPayPauseStatus d-none" data-eb-status="error" data-eb-color="danger">
                                        <i class="bi bi-x-square" style="font-size: 70px;"></i>
                                        <br/>
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




<script>
    $(document).ready(function() {

        // PicToPay -> Start
        $('#PicToPayMainStart').click(function(){
            const valor = $('#PicToPayMainValor');
            const tipo = $('#PicToPayMainType').val();
            if(valor.val() > 0){
                $('#PicToPayValorInfo').text('R$ ' + parseFloat(valor.val()).toFixed(2).replace('.', ','));
                $('#PicToPayTypeEntrada, #PicToPayTypeSaida').addClass('d-none');
                if(tipo == 0){
                    $('#PicToPayTypeEntrada').removeClass('d-none');
                }else{
                    $('#PicToPayTypeSaida').removeClass('d-none');
                }
                $('#PicToPay').modal('show');
            }else{ valor.focus(); }
        });

        // PicToPay Inicia o modal para leitura de QR Code
        var qrCodeReader = false;
        var tapPay = 0;

        $('#PicToPay').on('shown.bs.modal', function() { // Quando o modal for mostrado

            const agencia = $(this).data('eb-agencia');
            const tapCode = $(this).data('eb-tapCode');

            let x = window.ebScreen.x;
            let y = window.ebScreen.y;
            let d = parseInt($('#PicToPayCamera').offset().top.toFixed(0))
            let newY = y * (((y - d) / y)*0.95);
            $('#PicToPayCamera').css('cssText', 'height: ' + newY + 'px !important;');

            const statusBar = $(this).find('#PicToPayPause');
            const statusBarColor = 'text-bg-secondary text-bg-success text-bg-warning text-bg-danger';

            if (!qrCodeReader) {
                qrCodeReader = new Html5Qrcode("qr-reader"); // Inicializa o leitor de QR Code
            }

            qrCodeReader.start({
                    facingMode: "environment"
                }, {
                    fps: 2,
                    qrbox: function(viewfinderWidth, viewfinderHeight) {
                        let minEdge = Math.min(viewfinderWidth, viewfinderHeight);
                        let qrboxSize = Math.floor(minEdge * 0.7);
                        return {
                            width: qrboxSize * 1.2,
                            height: qrboxSize
                        };
                    },
                    aspectRatio: 1.0,
                    disableFlip: false,
                },
                function(qrCodeMessage) {

                    statusBar.addClass('d-none');

                    if (!qrCodeMessage) {
                        console.log('QR Code inválido');
                        statusBar.filter('[data-eb-status="erro"]').removeClass('d-none');
                        return;
                    }

                    qrCodeReader.pause(true);

                    $('#PicToPayPause')
                        .removeClass('d-none')
                        .removeClass(statusBarColor)
                        .addClass('text-bg-warning')
                        .find('.PicToPayPauseStatus[data-eb-status="processing"]')
                            .removeClass('d-none');
                    
                    $.ajax({
                        url: '/api.php/agencia/' + agencia + '/picToPay',
                        type: 'POST',
                        data: {
                            agencia: agencia,
                            tapValue: 200,
                            tapType: 1,
                            tapCode: tapCode,
                            qrCode: qrCodeMessage
                        },
                        dataType: 'json',
                        success: function(response) {

                            console.log(response);

                            // if (response.status == 'success') {
                            //     statusBar.filter('[data-eb-status="success"]').removeClass('d-none');
                            // } else if (response.status == 'error') {
                            //     statusBar.filter('[data-eb-status="error"]').removeClass('d-none');
                            //     $('#PicToPayPauseErrorText').text(response.message);
                            // }
                            // qrCodeReader.pause(false);

                            tapPay++; $('.PicToPayTapQt').text(tapPay);
                            
                        },
                        error: function(error) {
                            console.error(error);
                            statusBar.filter('[data-eb-status="erro"]').removeClass('d-none');
                            qrCodeReader.resume();
                        },

                        complete: function() {
                            
                            $('#PicToPayPause')
                                .removeClass('d-none')
                                .removeClass(statusBarColor)
                                .addClass('text-bg-success')
                                .find('.PicToPayPauseStatus')
                                    .addClass('d-none');

                            $('#PicToPayPause')
                                .removeClass('d-none')
                                .removeClass(statusBarColor)
                                .addClass('text-bg-success')
                                .find('.PicToPayPauseStatus[data-eb-status="success"]')
                                    .removeClass('d-none');

                            setTimeout(function() {
                                qrCodeReader.resume(); // Retornar a leitura de QR Code
                                $('#PicToPayPause').addClass('d-none');
                            }, 2000);
                        }
                    });

                },
                function(errorMessage) {
                    // console.warn("Erro leitura:", errorMessage);
                }
            );

        });
        $('#PicToPay').on('hidden.bs.modal', function() { // Quando o modal for fechado fecha a camera
            if (qrCodeReader) {
                qrCodeReader.stop().catch(() => {});
            }
        });

    })
</script>