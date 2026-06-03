<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">

        <div class="infomain bd-1 bd-primary mb-2 shadow-md d-flex justify-content-between">
            <span class="align-self-center"><i class="bi bi-trophy-fill text-warning me-1"></i> Ranking do uso do cartão</span>
        </div>

    </div>
    <div class="col-12">

        <table class="table table-sm table-striped tableReorder" id="GerenciaRankingCartaoTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Cartões</th>
                    <th>Compras</th>
                    <th>Parcelas</th>
                    <th>Total Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Chart['cartao'] as $User) { ?>
                <tr>
                    <td class="text-center"></td>
                    <td><?= $User['nome']; ?></td>
                    <td class="text-center"><?= count($User['card']); ?></td>
                    <td class="text-center"><?= $User['compras']; ?></td>
                    <td class="text-center"><?= $User['parcelas']; ?></td>
                    <td class="text-center"><?= number_format($User['total'], 2, '.', ''); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
