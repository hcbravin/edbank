<div class="row justify-content-center">
    <!-- <div class="col-12 mb-2 text-center"  style="height: 300px !important;">
        <canvas class="align-self-center mx-auto" style="height: 100%;" id="ChartTransacoes"></canvas>
    </div> -->

    <div class="col-12 col-sm-10 col-md-8">
        <div class="infomain bd-1 bd-primary mb-2 shadow-md">
            <i class="bi bi-trophy-fill text-warning me-1"></i> Ranking de Transações
        </div>

        <table class="table table-sm table-striped tableReorder" id="GerenciaRankingShopTable">
            <thead>
                <tr class="text-center">
                    <th class="d-none d-sm-table-cell">#</th>
                    <th class="text-start ps-2">Nome</th>
                    <th>Transações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Chart['contas'] as $User) { ?>
                <tr>
                    <td class="d-none d-sm-table-cell text-center">#</td>
                    <td class="border-start ps-2"><?= $User['user_nome']; ?></td>
                    <td class="border-start text-center"><?= $User['transacoes']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>