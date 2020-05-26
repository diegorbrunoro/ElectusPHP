<?php
unset($_SESSION['error']);
unset($_SESSION['success']);

foreach ($_SESSION as $key => $value) {
    if (strstr($key, 'error_')) {
        unset($_SESSION[$key]);
    }
}
