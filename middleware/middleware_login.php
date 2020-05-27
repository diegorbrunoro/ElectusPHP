<?php
session_start();
require 'helpers/auth.php';
require 'helpers/events.php';

if (!is_authenticated()) {
    flash_error('É necessário estar autenticado.');

    header('Location: ' . link_to(''));
}
