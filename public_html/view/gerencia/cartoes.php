<div class="infomain bd-1 bd-info shadow-md mb-2">
    Gerenciamento do cartão de débito dos clientes. Esse cartão também consede acesso a consulta de saldo via terminais de autoatendimento.
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
        <form action="/pdf/gerencia/<?= $URI[1]; ?>/cartoes/multi" method="post" id="GerenciaCardListGroupForm" target="_blank">

            <div class="mb-2 d-flex justify-content-between">
                <button class="btn btn-sm btn-primary" type="button" id="GerenciaCardListGroupSelectAll">
                    <i class="bi bi-check-square me-1"></i> Selecionar Todos
                </button>
                <button class="btn btn-sm btn-success" type="button" id="GerenciaCardListGroupSubmiter">
                    <i class="bi bi-printer-fill me-1"></i> Gerar Selecionados
                </button>
            </div>

            <ul class="list-group shadow-md" id="GerenciaCardListGroup">
                <?php foreach ($Contas as $KeyC => $ViewC) { ?>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <input class="form-check-input align-self-center" name="cartoes[<?= $ViewC['ct_user']; ?>]" type="checkbox" value="<?= $ViewC['ct_id']; ?>">
                                <div class="ms-2 align-self-center">
                                    <strong><?= $ViewC['user_nome']; ?></strong>
                                    <br>
                                    <small class="opacity-75 ft-10"><?= $ViewC['user_email']; ?></small>
                                </div>
                            </div>
                             <!-- target="_blank" href="/pdf/gerencia/<?= $URI[1]; ?>/cartoes/<?= $ViewC['ct_id']; ?>/<?= $TokenGet; ?>" -->
                            <button type="button" class="btn btn-sm btn-secondary align-self-center GerenciaCardListGroupPrint">
                                <i class="bi bi-printer-fill me-1"></i> Imprimir
                            </button>
                        </div>
                    </li>
                <?php } ?>
            </ul>


            <?= Token(); ?>
        </form>
    </div>
</div>