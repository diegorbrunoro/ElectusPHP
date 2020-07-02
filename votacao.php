<?php
    require_once 'Entities/BrunoroUsuario.php';
    require_once 'Entities/BrunoroVotacao.php';
    require_once 'middleware/middleware_login.php';
    require_once 'helpers/connection.php';
    include 'layout/head.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['candidato'])) {
        $brunoroVotacao = new BrunoroVotacao();

        if ($brunoroVotacao->jaVotou()) {
            flash_error('Você já votou');
        } else {
            $brunoroVotacao->salvarVotacao($_POST['candidato']);
            flash_success('Votacão registrada com sucesso');
        }
    }

    $brunoroUsuario = new BrunoroUsuario();
    $candidatos = $brunoroUsuario->candidatos();
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
                        <h3 class="mb-0">Vote no seu candidato</h3>
                    </div>
                    <form action="<?=link_to('votacao.php')?>" method="POST">
                        <div class="card-body">
                            <?php foreach($candidatos as $candidato) : ?>
                                <div class="card float-left mb-5 mr-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title text-bold">
                                            <?=$candidato->usu_nome?>
                                        </h5>
                                        <button type="submit"
                                                name="candidato"
                                                value="<?=$candidato->id_usuario?>"
                                                class="btn btn-primary">
                                            Votar
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'layout/bottom.php'?>
