<div class="modal" tabindex="-99" id="ModalCardVirtual" data-bs-keyboard="false">
    <div class="modal-dialog modal-fullscreen-sm-down">
        <div class="modal-content">

            <div class="modal-header text-bg-warning">
                <h5 class="modal-title">
                    <i class="bi bi-credit-card-2-front-fill me-1"></i> Cartão de Débito Virtual
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column overflow-hidden align-items-center" id="VirtualCardMain">

               <?= $Conta -> CartaoRender(array_merge($CartaoVirtual, ['card_titular' => $fConta['user_nome'], 'card_tipo_nome' => 'Débito']));
                ?>

                <!-- qrCode -->
                 <div class="row w-100">
                    <div class="col-12 col-md-8 col-lg-6 w-100 mt-5 mt-md-0 text-center">
                        <img src="<?= $qrCode -> render($CartaoVirtual['card_numero']); ?>" alt="QR Code" class="<?= $Mobile ? 'mt-5 w-100' : ''; ?>">
                    </div>
                 </div>
            </div>

            <div class="modal-footer text-center">
                Leve seu cartão onde for, sem necessidade de telo fisicamente. O cartão virtual é a ferramenta mais segura para fazer compras na internet.
            </div>
        </div>
    </div>
</div>