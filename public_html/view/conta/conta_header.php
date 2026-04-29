<!-- Saudação e Saldo -->
<div class="row mb-4">
    <div class="col-md-8 mx-auto">
        <div class="card text-bg-primary shadow">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-6 col-sm-8  d-none d-md-block">
                        <h5 class="card-title">Olá, <?= mb_convert_case($MS['user_nome'], MB_CASE_TITLE, 'UTF-8'); ?>!</h5>
                    </div>
                    <div class="col-12 col-sm-4 text-end">
                        <button type="button" class="float-start float-sm-none btn btn-sm btn-outline-light" id="notificacoesContaButton" data-bs-target="#notificacoesContaModal" data-bs-toggle="modal">
                            <i class="bi bi-bell-fill text-warning"></i> Notificações <span class="badge ms-2 rounded-pill text-bg-danger <?= $NotificacoesClose == 0 ? 'd-none' : ''; ?>"><?= $NotificacoesClose; ?></span>
                        </button>
                        <a href="/conta/<?=$URI[1];?>" class="btn btn-sm btn-warning ft-10 <?=(!$URI[2]?'d-none':'');?>"><i class="bi bi-arrow-counterclockwise"></i> Início</a>
                    </div>
                    <div class="col-12 mt-2 d-md-none">
                        <h5 class="card-title">Olá, <?= mb_convert_case($MS['user_nome'], MB_CASE_TITLE, 'UTF-8'); ?>!</h5>
                    </div>
                </div>
                <hr class="my-2">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="card-text mb-1">Saldo disponível</p>
                        <h2 class="fw-bold text-shadow-md" id="ContaMeuSaldo" data-eb-contasaldo="<?= $fConta['ct_saldo']; ?>">R$ <?=number_format($fConta['ct_saldo'],2,',','.');?> </h2>
                    </div>
                    <div class="align-self-center" id="ContaMeuID" data-eb-conta="<?= $URI[1]; ?>">
                        <small>Conta: <?=$fConta['ct_conta'].'-'.$fConta['ct_digito'];?></small><br>
                        <small>Agência: <?=ZeroEsquerda($fConta['ag_num']);?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Notificações -->
<?php if($URI[2] != 'notificacoes'){ require_once Modal . '/notificacoesConta.php'; } ?>