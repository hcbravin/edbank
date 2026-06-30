<form action="/exe/agencia/liquidar-pendencias" method="post" id="gerenciaPendenciasForm">
    <div class="row">
        <div class="col-12 mb-2">
            <div class="infomain mb-2 shadow-md bd-1 bd-info">
                Aqui você poderá finalizar as pendências em aberto de todas as contas. Ao finalizar as pendências todos os débitos de cartão, empréstimos, contas à pagar serão liquidados e os investimentos serão resgatados. Caso não exista saldo suficiente, as contas ficarão negativas.
            </div>
        </div>

        <div class="col-12 mb-2 text-end">
            <?= Button('save', false, 'gerenciaPendenciasSend'); ?>
            <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
            <?= Token(); ?>
        </div>
    </div>

    <table class="table table-sm table-striped" id="gerenciaPendenciasContas">
        <thead>
            <tr class="main">
                <th>#</th>
                <th>Conta</th>
                <th class="text-start">Cliente</th>
                <th>Saldo</th>
                <th>Finalizar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Contas as $KeyC => $ViewC) { ?>
                <tr class="text-center border-dashed-start iPendenciasConta">
                    <td class="align-middle"><input class="form-check-input" name="contas[<?= $ViewC['ct_id'] ?>]" type="checkbox" value="<?= $KeyC; ?>"></td>
                    <td class="align-middle"><?= $ViewC['ct_conta'] . ' - ' . $ViewC['ct_digito']; ?></td>
                    <td class="align-middle text-start"><?= $ViewC['user_nome']; ?></td>
                    <td class="align-middle px-2">
                        <div class="d-flex justify-content-between">
                            <span>R$</span>
                            <span><?= number_format($ViewC['ct_saldo'], 2, ',', '.'); ?></span>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary getPendenciasContasButtonFinalizar"><i class="bi bi-bag-dash-fill me-1"></i> Finalizar</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>