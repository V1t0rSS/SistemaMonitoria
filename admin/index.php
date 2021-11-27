<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tutoria</title>
    <?php include('./includes/head.php') ?>
</head>
<body class="bg-light">
    <?php include('./includes/header.php') ?>
    <?php include('./includes/sidebar.php') ?>
    <!-- Main Container-->
    <div id="main-container" class="bg-body">
        <div class="d-flex justify-content-between">
            <h3>Início</h3>
            <div><i class='bx bx-calendar'></i> <span>22/10/2021</span></div>
        </div>
        <div class="container mt-4 px-0">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-stats bg-light">
                                <h6 class="text-center">Monitorias Agendadas</h6>
                                <div class="text-center fw-bold fs-3">
                                    30
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-success">+2,2% - média</span>
                                    <a href="#">+ detalhes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-stats bg-light">
                                <h6 class="text-center">Presenças Informadas</h6>
                                <div class="text-center fw-bold fs-3">
                                    124
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-success">+2,2% - média</span>
                                    <a href="#">+ detalhes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card-stats bg-light">
                                <h6 class="text-center">Monitorias Realizadas</h6>
                                <div class="text-center fw-bold fs-3">
                                    23
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-success">+2,2% - média</span>
                                    <a href="#">+ detalhes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-stats bg-light">
                                <h6 class="text-center">Presenças Confirmadas</h6>
                                <div class="text-center fw-bold fs-3">
                                    61
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-success">+2,2% - média</span>
                                    <a href="#">+ detalhes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h6 class="text-center">Monitorias por Categoria</h5>
                    <div class="justify-content-center" style="width: 400px; margin: auto">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php include('./includes/scripts_footer.php') ?>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const mixedChart = new Chart(ctx, {
  type: 'scatter',
    data: {
        labels: [
            'Presencial',
            'Remoto',
            'Fórum'
        ],
        datasets: [{
            type: 'bar',
            data: [9, 20, 14],
            backgroundColor: [
                'rgba(255, 39, 22, 0.2)',
                'rgba(20, 225, 66, 0.2)',
                'rgba(30, 29, 202, 0.2)'
            ],
            borderColor: 'rgb(255, 99, 132)'
        }, {
            type: 'line',
            data: [9, 20, 14],
            fill: false,
            borderColor: 'rgb(54, 162, 235)'
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                stacked: true,
                beginAtZero: true,
                grid: {
                    display: false
                }
            }
        },
        plugins: {
            title: {
                display: false,
                text: 'Monitorias por Categoria'
            },
            legend: {
                display: false
            }
        }
    }
});

</script>