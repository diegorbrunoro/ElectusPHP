<?php
require_once 'Entities/BrunoroUsuario.php';
require_once 'Entities/BrunoroVotacao.php';
require_once 'middleware/middleware_login.php';
require_once 'helpers/connection.php';
include 'layout/head.php';

$brunoroUsuario = new BrunoroUsuario();
$charts = $brunoroUsuario->candidatos_chart();

?>

<div class="container py-3">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row pb-4">

                    <div class="col-lg-12">
                        <form method="POST" action="">
                            <button type="submit" name="quero_ser_candidato" class="btn btn-success nav-link">
                                Quero ser candidato
                            </button>
                        </form>
                    </div>

                    <div class="col-lg-12">
                        <?=show_alerts()?>
                    </div>
                </div>
                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h3 class="mb-0">Situação da votação</h3>
                    </div>

                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
            integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        (function() {
            var myBarChart = new Chart(document.getElementById('myChart'), {
                type: 'bar',
                data: {
                    labels: <?=$charts['labels'];?>,
                    datasets: [
                        {
                            label: "Votação",
                            backgroundColor: <?=$charts['colors']?>,
                            data: <?=$charts['counts']?>
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Predicted world population (millions) in 2050'
                    }
                }
            });
        })();
    </script>

    </body>
    </html>
