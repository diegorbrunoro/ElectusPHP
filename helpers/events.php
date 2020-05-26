<?php
function show_alerts () {
    if (isset($_SESSION['error'])) {
        return bootstrap_alert($_SESSION['error'], 'danger');
    }
    if (isset($_SESSION['success'])) {
        return bootstrap_alert($_SESSION['success'], 'success');
    }
    return "";
}

function bootstrap_alert ($text, $type) {
    return '<div class="alert alert-'.$type.'">'.$text.'</div>';
}

function has_error($key)
{
    return isset($_SESSION[$key]) && !empty($_SESSION[$key]) ? ' is-invalid' : '';
}

function flash($key, $text, $type = 'error')
{
    $_SESSION[$type . '_' . $key] = $text;
}

function flash_error($text)
{
    $_SESSION['error'] = $text;
}

function flash_success($text)
{
    $_SESSION['success'] = $text;
}
