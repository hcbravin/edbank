<div class="row justify-content-center">

    <!-- Infomrativo -->
    <div class="col-12 col-md-8 mb-3">
        <div class="infomain shadow-md bd-1 bd-warning">
            <i class="bi bi-x-diamond-fill me-1"></i> Área Pix
        </div>
    </div>

    <!-- Botoes -->
    <div class="col-12 col-sm-10 mb-2">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-3 col-lg-2 mb-2">
                <button type="button" id="" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#pixEnviarModal">
                    <i class="bi bi-x-diamond-fill fs-4"></i>
                    <br>
                    <small>Enviar</small>
                </button>
            </div>
            <div class="col-6 col-sm-3 col-lg-2 mb-2">
                <button type="button" id="" class="btn btn-outline-warning w-100" <?= count($MinhasChaves) == 0 ? 'disabled' : ''; ?> data-bs-toggle="modal" data-bs-target="#pixReceberModal">
                    <i class="bi bi-cash-stack fs-4"></i>
                    <br>
                    <small>Receber</small>
                </button>
            </div>
            <div class="col-6 col-sm-3 col-lg-2 mb-2">
                <button type="button" id="" class="btn btn-outline-warning w-100"  data-bs-toggle="modal" data-bs-target="#pixQRCodeModal">
                    <i class="bi bi-qr-code fs-4"></i>
                    <br>
                    <small>Ler QrCode</small>
                </button>
            </div>
            <div class="col-6 col-sm-3 col-lg-2 mb-2">
                <button type="button" id="" class="btn btn-outline-warning w-100 position-relative" data-bs-toggle="modal" data-bs-target="#pixChavesModal">
                    <i class="bi bi-key-fill fs-4"></i>
                    <br>
                    <small>Minhas Chaves</small>
                    <?php if($PixChavesAtivas < 2){ ?>
                    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                        <?= $PixChavesAtivas; ?> de 2
                    </span>
                    <?php } ?>
                </button>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 mt-3">
        <?php if(is_array($PixTransferencias) AND count($PixTransferencias) > 0){ ?>
        <ul class="list-group">
            <?php foreach($PixTransferencias as $KeyT=>$ViewT){ ?>
            <li class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="bi fs-2 me-3 bi-arrow-<?= $ViewT['tr_origem'] == $URI[1] ? 'up-square-fill text-danger' : 'down-square-fill text-success'; ?>"></i>
                        <div>
                            <h6 class="mb-1"><?= $ViewT['tr_origem'] == $URI[1] ? 'Enviado para ' . $ViewT['nomeDestino'] : 'Recebido de ' . $ViewT['nomeOrigem']; ?></h6>
                            <small class="text-muted"><?= Data($ViewT['tr_dref'], 3); ?></small>
                        </div>
                    </div>
                    <div class="text-end text-nowrap ms-3 ms-sm-2">
                        <h6 class="mb-1 fw-bold text-<?= $ViewT['tr_origem'] == $URI[1] ? 'danger' : 'success'; ?>"><?= $ViewT['tr_origem'] == $URI[1] ? '-' : ''; ?> R$ <?= numBR($ViewT['tr_valor']); ?></h6>
                        <small class="text-muted"><?= ucfirst($ViewT['tr_tipo_texto']); ?></small>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <?php }else{ ?>
        <div class="infomain bd-1 bd-info shadow-md text-center">Você ainda não realizou nem recebeu nenhum <i class="bi bi-x-diamond-fill ms-1"></i> Pix.</div>
        <?php } ?>
    </div>
</div>