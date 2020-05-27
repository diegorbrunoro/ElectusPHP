<?php
require './helpers/connection.php';
require './helpers/auth.php';
require './helpers/events.php';

session_start();
$auth = check($_POST['email'], $_POST['password']);
if (!$auth) {
    flash_error('Login ou senha inválidos');
    flash('email', 'Ops');
    flash('password', 'Ops');

    header('Location: ' . link_to());
} else {
    $_SESSION = $auth;

    flash_success('Bem-vindo');

    header('Location: ' . link_to('cadastro_usuario.php'));
}
