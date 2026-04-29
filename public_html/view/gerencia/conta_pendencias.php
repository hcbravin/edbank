<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-10">
        <div class="infomain bd-1 bd-danger mb-2 shadow-sm">
            <div class="d-flex justify-content-between">
                <span><i class="bi bi-exclamation-triangle me-1"></i> Pendeências</span>
                <div class=" align-self-center">
                    <i class="bi bi-list-ul me-1"></i> <?= ($Pendencias['total']); ?></span> 
                    
                    <span class="badge text-bg-primary align-self-center">R$ <?= number_format($Pendencias['valor'],2,',','.'); ?></span>
                </div>
            </div>
        
        </div>

        <ul class="list-group">
            <?php foreach(array_reverse($Pendencias) as $KeyP => $ViewP){if(is_numeric($KeyP)){
                foreach($ViewP['ctp_contas'] as $KeyI =>$ViewI){ ?>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto align-self-center">
                    <div class="fw-bold"><span><?= $ViewI['nome']; ?></span></div>
                    <div class="text-muted ft-9"><span>CICLOS: <?= $ViewI['ciclo']; ?></span></div>
                </div>
                <div class="text-end w-px-150 align-self-center">
                    <div class="fw-bold text-danger mb-1 rounded">R$ <?= number_format($ViewI['valor'], 2, ',', '.'); ?></div>
                    <span class="text-muted small"><?= ($ViewI['juros']) ? $ViewI['juros'] . '% a.m.' : 'Sem juros.'; ?></span>
                </div>
            </li>
            <?php }}} ?>
        </ul>
    </div>
</div>