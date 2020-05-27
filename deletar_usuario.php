<?php
session_start();

include "helpers/auth.php";
include "helpers/connection.php";
include "helpers/events.php";


if (!isset($_GET['id']) || (isset($_GET['id']) && empty($_GET['id'])))
    header('Location: ' . $_SERVER['HTTP_REFERER']);

$id = $_GET['id'];

if (remove_user($id)) {
    flash_success('Deletado com sucesso');
} else {
    flash_error('Opa, falha ao deletar o usuário');
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
