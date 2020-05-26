<?php session_start() ?>

<?php require './helpers/events.php' ?>

<?php include 'layout/head.php'?>

<?php if (is_authenticated()) header('Location: cadastro_usuario.php'); ?>

<div class="global-container">
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Sistema de Votação</h3>
            <div class="card-text">
                <?=show_alerts()?>
                <!--
                <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                <form method="post" action="login.php">
                    <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control form-control-sm<?=has_error('error_email')?>"
                               id="email"
                               name="email"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control form-control-sm<?=has_error('error_email')?>"
                               name="password"
                               id="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>

                    <div class="sign-up">
                        Não esta cadastrado? <a href="#">Cadastre aqui!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/bottom.php'?>


