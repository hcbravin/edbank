<div class="row justify-content-center">
    <div class="col-12 mb-2 text-center"  style="height: 300px !important;">
        <canvas class="align-self-center mx-auto" style="height: 100%;" id="ChartTransacoes"></canvas>
    </div>

    <div class="col-12 col-sm-10 col-md-8">
        <div class="infomain bd-1 bd-primary mb-2 shadow-md">
            <i class="bi bi-trophy-fill text-warning me-1"></i> Ranking de Transações
        </div>

        <ol class="list-group list-group-numbered">
            <?php foreach ($Chart['contas'] as $User) { ?>

                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                    <span class="fw-bold w-100 ms-2"><?= $User['user_nome']; ?></span>
                    <span class="badge bg-primary rounded"><?= $User['transacoes']; ?></span>
                </li>

            <?php } ?>
        </ol>
    </div>
</div>
<script>
    $(function() {
        var ChartTransacoes = new Chart(
            document.getElementById('ChartTransacoes'), {
                type: 'bar',
                options: {
                    animation: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        }
                    },
                    responsive: true, // Garante responsividade
                    maintainAspectRatio: false, // Permite que o gráfico ignore a proporção padrão e ocupe o espaço
                },
                data: {
                    labels: [<?php foreach ($Chart['agencia'] as $KeyC => $ViewC) {
                                echo "'{$ViewC['semana']}ª',";
                            } ?>],
                    datasets: [{
                        label: 'Acquisitions by year',
                        data: [<?php foreach ($Chart['agencia'] as $Data) {
                                echo $Data['transacoes'] . ',';
                            } ?>]
                    }]
                }
            }
        );
    })
</script>