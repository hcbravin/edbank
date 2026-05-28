<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">
        <div class="card shadow-md">
            <div class="card-header text-bg-primary">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> Atenção
            </div>
            <div class="card-body ">
                <div class="text-center fw-bold">Esta opção irá executar o ciclo instantaneamente.</div>
                <hr>
                Com os ciclo será realizado:
                <ol class="list-group mt-2 list-group-numbered">
                    <li class="list-group-item">Realiza as operações com o cartão associando os gastos</li>
                    <li class="list-group-item">Realiza as operações com os investimentos</li>
                    <li class="list-group-item">Realiza as operações de débitos automáticos</li>
                    <li class="list-group-item">Realiza as operações de sorte reves (caso estejam configuradas)</li>
                    <li class="list-group-item">Outras ações</li>
                </ol>
                <div class="text-end mt-2">
                    <button type="button" data-eb-cfm="exe/agencia/ciclo/<?= $URI[1]; ?>/<?= Token('get'); ?>" class="btn btn-sm btn-primary w-px-150"><i class="bi bi-rocket-fill me-1"></i> Executar Ciclo</button>
                </div>
            </div>
        </div>
    </div>
</div>