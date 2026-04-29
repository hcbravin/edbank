<div class="row mb-2">
    <div class="col-6 col-sm-3 col-md-2 mb-2 mb-sm-0">
        <div class="infomain shadow-md bd-1 bd-primary d-flex justify-content-between">
            <span>Agência</span> <strong><?= ZeroEsquerda($MS['gerente'][$URI[1]]['ag_num']); ?></strong>
        </div>
    </div>
    <div class="col-6 col-sm-3 col-md-2 mb-2 mb-sm-0">
        <div class="infomain shadow-md bd-1 bd-secondary d-flex justify-content-between">
            <span><i class="bi bi-<?= !is_null($MS['gerente'][$URI[1]]['ag_key']) ? 'lock' : 'unlock'; ?> me-1"></i> Chave</span>
            <span class="mx-1"><?= (!is_null($MS['gerente'][$URI[1]]['ag_key']) AND $MS['gerente'][$URI[1]]['ag_key'] != 'NULL') ? $MS['gerente'][$URI[1]]['ag_key'] : 'Não Requer'; ?></span>
        </div>
    </div>
    <div class="col-6 col-sm-3 col-md-2 mb-2 mb-sm-0">
        <form action="/upg/agencia/prorrogar" method="post" id="AgenciaTimeSubmit">
            <div class="infomain shadow-md bd-1 d-flex justify-content-between <?= ($MS['gerente'][$URI[1]]['ag_dias'] < 30 ? 'text-bg-danger bd-dark' : 'bd-primary'); ?>">
                <span><i class="bi bi-hourglass-split me-1"></i> <?= $MS['gerente'][$URI[1]]['ag_dias']; ?> dias</span>

                <?php if ($MS['gerente'][$URI[1]]['ag_dias'] < 30) { ?>
                    <input type="hidden" name="agencia" value="<?= $URI[1]; ?>">
                    <span class="badge-alt text-bg-warning align-self-center mpoint" onclick="$('#AgenciaTimeSubmit').submit();"><i class="bi bi-plus-lg"></i> 30 Dias</span>
                <?php } ?>
            </div>
        </form>
    </div>

    <div class="col-6 col-sm-3 col-md-3 col-lg-2 offset-md-3 offset-lg-4 text-end">
        <div class="dropdown">
            <button class="w-100 btn btn-sm btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list me-1"></i> Opções do Gerente
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/contas"><i class="bi bi-people me-1"></i> Contas</a></li>
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/pendencias"><i class="bi bi-clock me-1"></i> Pendências</a></li>
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/configuracoes"><i class="bi bi-gear me-1"></i> Configurações</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/ranking/transacoes"><i class="bi bi-currency-dollar me-1"></i> Ranking Transações</a></li>
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/ranking/shop"><i class="bi bi-cart me-1"></i> Ranking Shopping</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/ciclo"><i class="bi bi-clock-history me-1"></i> Ciclo Manual</a></li>
                <li><a class="dropdown-item" href="/gerencia/<?= $URI[1]; ?>/depositar"><i class="bi bi-send-plus-fill me-1"></i> Depositar</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="infomain bd-1 bd-primary mb-2 shadow-md">
            <?php if(strlen($MS['gerente'][$URI[1]]['ag_info'])){ ?>
                <span class="me-2 text-muted">
                    <i class="bi bi-bank me-1"></i> [<?= $MS['gerente'][$URI[1]]['ag_info']; ?>]
                </span>
            <?php } ?>

            <?php switch($URI[2]){
                case 'contas': print '<i class="bi bi-people me-1"></i> Contas'; break;
                case 'ranking': print '<i class="bi bi-bar-chart-fill me-1"></i> Ranking'; 
                    switch($URI[3]){
                        case 'transacoes': print '<i class="bi bi-currency-dollar ms-2 me-1"></i> Transações'; break;
                        case 'shop': print '<i class="bi bi-cart ms-2 me-1"></i> Shop'; break;
                    }
                    break;
                case 'pendencias': print '<i class="bi bi-clock me-1"></i> Pendências'; break;
                case 'configuracoes': print '<i class="bi bi-gear me-1"></i> Configurações'; break;
                default: print 'Erro.';
            } ?>
            <?php switch($URI[4]){
                case 'extrato': print '<i class="bi bi-file-text mx-1"></i> Extrato'; break;
                
                
            } ?>
            <!-- <?= (is_numeric($URI[3]) ? '<i class="bi bi-person mx-1"></i> <strong id="ContaHeaderNome">Nome</strong>' : ''); ?> -->
        </div>
        
    </div>
</div>