<div class="<?=$Mobile?'table-responsive':'';?>">
    <table class="table table-hover table-sm mb-0 ft-10" id="TableClientes">
        <thead>
            <tr class="main">
                <td><i class="bi bi-pc-display me-1"></i> Conta</td>
                <td><i class="bi bi-person me-1"></i> Titular</td>
                <td><i class="bi bi-cash me-1"></i> Saldo</td>
                <td><i class="bi bi-exclamation-diamond-fill me-1"></i> Status</td>
                <td><i class="bi bi-calendar me-1"></i> Criada</td>
                <td><i class="bi bi-collection me-1"></i> Opções</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Contas as $KeyC => $ViewC) { ?>
                <tr class="text-center">
                    <td class="align-middle"><?= $ViewC['ct_conta'] . ' - ' . $ViewC['ct_digito']; ?></td>
                    <td class="align-middle text-uppercase">
                        <div><?= $ViewC['user_nome']; ?></div>
                        <div class="ft-8" style="color: rgb(0,0,0,0.4)">(<?= strtolower($ViewC['user_email']); ?>)</div>
                    </td>
                    <td class="align-middle">
                        <div class="btn-group w-75">
                            <a href="/gerencia/<?=$URI[1];?>/contas/<?=$ViewC['ct_id'];?>/depositar" class="btn btn-sm btn-success"><i class="bi bi-send-plus-fill"></i></a>
                            <span class="btn btn-sm w-100 btn-light border border-start-0 border-<?=$ViewC['ct_saldo']>0?'success text-success':'danger text-danger';?>">
                                <span class="ms-2">R$ <?= number_format($ViewC['ct_saldo'], 2, ',', ''); ?></span>
                            </span>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="w-75 text-bg-<?= ($ViewC['ct_ativo'] ? 'success' : 'danger'); ?> rounded mx-auto">
                            <?= ($ViewC['ct_ativo'] ? 'Ativo' : 'Inativo'); ?>
                        </div>
                    </td>
                    <td class="align-middle">
                        <?=Data($ViewC['ct_movimentacao'],3);?>
                    </td>
                    <td class="align-middle">
                        <a href="/gerencia/<?=$URI[1];?>/contas/<?=$ViewC['ct_id'];?>" class="btn btn-sm btn-primary w-px-100 ft-10"><i class="bi bi-folder2-open me-1"></i> Acessar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(function(){
        // $('#TableClientes').DataTable({"paging": false,"ordering": [[1, "asc"]],"info": false});
        // $('#TableClientes_wrapper').find('input[type="search"]').focus();
    });
</script>