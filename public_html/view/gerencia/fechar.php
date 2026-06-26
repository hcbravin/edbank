<div class="row">
    <div class="col-12 col-md-6">
        <div class="infomain bd-1 text-bg-light bd-warning shadow-md mb-2 text-center">
            <div>
                O <span class="text-warning fw-bold">Fechamento</span> da agência não encerra a mesma de fato. 
                <br>
                Com o fechamento da agência a mesma fica bloqueada para as contas.
                <br>
                Caso deseje reativar a agência, basta adicionar dias clicando no botão +30 dias.
            </div>
            <button class="btn btn-sm btn-warning mt-4 mb-2" data-eb-rmv="upg/agencia/fechar/<?= $URI[1]; ?>/<?= Token('get'); ?>"><i class="bi bi-building-fill-lock me-1"></i> Fechar Agência</button>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="infomain bd-1 text-bg-light bd-danger shadow-md mb-2 text-center">
            <div>
                O <span class="text-danger fw-bold">Encerramento</span> da agência irá finalizar a agência definitivamente.
                <br>
                Com o encerramento da agência a mesma fica permanentemente bloqueada para as contas.
                <br>
                Todos os dados serão processados, cartões pagos, investimento resgatados, contas finalizadas.
            </div>
            <button class="btn btn-sm btn-danger mt-4 mb-2" data-eb-rmv="upg/agencia/encerrar/<?= $URI[1]; ?>/<?= Token('get'); ?>"><i class="bi bi-house-lock-fill me-1"></i> Encerrar Agência</button>
        </div>
    </div>
</div>