<?php
include 'helpers/auth.php';

session_start();
session_destroy();
header('Location: ' . link_to());
