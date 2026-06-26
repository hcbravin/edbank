<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8">

        <div class="infomain bd-1 bd-primary mb-2 shadow-md d-flex justify-content-between">
            <span class="align-self-center"><i class="bi bi-trophy-fill text-warning me-1"></i> Ranking de investimentos</span>
        </div>

        <canvas id="invChart" class="mb-2"></canvas>


        <table class="table table-sm table-striped tableReorder" id="GerenciaRankingInvestimentosTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor Total (R$)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Chart['investimento'] as $User) { ?>
                    <tr>
                        <td class="text-center"></td>
                        <td><?= $User['nome']; ?></td>
                        <td class="text-center"><?= $User['quantidade']; ?></td>
                        <td class="text-center"><?= number_format($User['total'], 2, '.', ''); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    // Aguardar o carregamento completo da página
    document.addEventListener('DOMContentLoaded', function() {
        // Obter o contexto do canvas
        const ctx = document.getElementById('invChart').getContext('2d');

        // Criar o gráfico de barras
        const myChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico: barra
            data: {
                labels: [<?php foreach($Chart['investimentoChart'] as $View){ echo '"' . $View['nome'] . '",';} ?>],
                datasets: [{
                    label: 'Quantidade',
                    data: [<?php foreach($Chart['investimentoChart'] as $View){ echo '"' . $View['quantidade'] . '",';} ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    borderRadius: 5,
                    barPercentage: 0.7,
                    categoryPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    title: {
                        display: false,
                        text: 'Investimentos',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    },
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantidade',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        title: {
                            display: false,
                            text: 'Tipos de Investimentos',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    });
</script>